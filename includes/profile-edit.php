<?php

  /* image validation */
	if(!empty($_FILES['image']['name'])) {
		$folder = "uploads/";
		if(!file_exists($folder)) {
			mkdir($folder, 0777, true);
			file_put_contents($folder.'index.html', 'Access denied');
		}

		$allowed = ['image/jpeg','image/png'];
		if(in_array($_FILES['image']['type'], $allowed)) {
			$image = $folder . time() . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);

		} else {
			$info['errors']['image'] = "Only images of this type allowed: ".implode(", ", $allowed);
		}
	}

	//validate email
	/* if(empty($_POST['email'])) { */
	/* 	$info['errors']['email'] = "An email is required"; */
	/* } else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) { */
	/* 	$info['errors']['email'] = "Email is not valid"; */
	/* } */

	/* validate firstname */
	if(empty($_POST['firstname'])) {
		$info['errors']['firstname'] = "A first name is required";
	} else if(!preg_match("/^[\p{L}]+$/", $_POST['firstname'])) {
		$info['errors']['firstname'] = "First name cant have special characters or spaces and numbers";
	}

	/* validate lastname */
	if(empty($_POST['lastname'])) {
		$info['errors']['lastname'] = "A last name is required";
	} else if(!preg_match("/^[\p{L}]+$/", $_POST['lastname'])) {
		$info['errors']['lastname'] = "Last name cant have special characters or spaces and numbers";
	}

	/* validate gender */
	/* $genders = ['Male','Female', 'Others']; */
	/* if(empty($_POST['gender'])) { */
	/* 	$info['errors']['gender'] = "A gender is required"; */
	/* } else if(!in_array($_POST['gender'], $genders)) { */
	/* 	$info['errors']['gender'] = "Gender is not valid"; */
	/* } */

  /* validate batch year */
	if(empty($_POST['batchyr'])) {
		$info['errors']['batchyr'] = "A batch year is required";
	} else if($_POST['batchyr']>2023) {
		$info['errors']['batchyr'] = "Batch Year is not valid";
	}

  /* validate batch year */
	if(empty($_POST['occupation'])) {
		$info['errors']['occupation'] = "A occupation is required";
	}

	/* validate password */
	if(!empty($_POST['password'])) {
		if($_POST['password'] !== $_POST['retype_password']) {
			$info['errors']['password'] = "Passwords dont match";
		} else if(strlen($_POST['password']) < 8) {
			$info['errors']['password'] = "Password must be at least 8 characters long";
		}
	}



	if(empty($info['errors']) && $row) {
		//save to database
		$arr = [];
		$arr['id'] = $row['id'];

		$image_query = "";
		if(!empty($image)) {
			$arr['image'] = $image;
			$image_query = "image = :image";
		}

		$arr['email'] = $_POST['email'];
		$arr['firstname'] = $_POST['firstname'];
		$arr['lastname'] = $_POST['lastname'];
		$arr['gender'] = $_POST['gender'];
		$arr['batchyr'] = $_POST['batchyr'];
		$arr['occupation'] = $_POST['occupation'];
		$arr['date'] = date("Y-m-d H:i:s");
		$arr['facebook'] = $_POST['facebook'];
		$arr['twitter'] = $_POST['twitter'];
		$arr['linkedin'] = $_POST['linkedin'];

		$password_query = "";
		if(!empty($_POST['password'])) {
			$arr['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$password_query = ",password = :password";
		}
 
    db_query("UPDATE users SET
      id = :id,
      $image_query,
      email = :email,
      firstname = :firstname,
      lastname = :lastname,
      gender = :gender,
      batchyr = :batchyr,
      occupation = :occupation,
      date = :date
      $password_query
      WHERE id = :id LIMIT 1",$arr);

		//delete old image
		if(!empty($image) && file_exists($row['image'])) {
			unlink($row['image']);
		}

		$row = db_query("select * from users where id = :id limit 1",['id'=>$row['id']]);
		if($row) {
			$row = $row[0];
			$_SESSION['PROFILE'] = $row;
		}

		$info['success'] 	= true;
	}
