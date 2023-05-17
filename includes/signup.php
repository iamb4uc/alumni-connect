<?php

	/* validate firstname */
	if(empty($_POST["firstname"])) {
		$info["errors"]["firstname"] = "A first name is required";
	} else if(!preg_match("/^[\p{L}]+$/", $_POST["firstname"])) {
		$info["errors"]["firstname"] = "First name cant have special characters or spaces and numbers";
	}

	/* validate lastname */
	if(empty($_POST["lastname"])) {
		$info["errors"]["lastname"] = "A last name is required";
	} else if(!preg_match("/^[\p{L}]+$/", $_POST["lastname"])) {
		$info["errors"]["lastname"] = "Last name cant have special characters or spaces and numbers";
	}

	/* validate email */
	if(empty($_POST["email"])) {
		$info["errors"]["email"] = "An email is required";
	} else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
		$info["errors"]["email"] = "Email is not valid";
	}

	//validate gender
	$genders = ["Male","Female", "Others"];
	if(empty($_POST["gender"])) {
		$info["errors"]["gender"] = "A gender is required";
	} else if(!in_array($_POST["gender"], $genders)) {
		$info["errors"]["gender"] = "Gender is not valid";
	}

	/* validate password */
	if(empty($_POST["password"])) {
		$info["errors"]["password"] = "A password is required";
	} else if($_POST["password"] !== $_POST["retype_password"]) {
		$info["errors"]["password"] = "Passwords dont match";
	} else if(strlen($_POST["password"]) < 8) {
		$info["errors"]["password"] = "Password must be at least 8 characters long";
	}

	/* validate batchyr */
	if(empty($_POST["batchyr"])) {
		$info["errors"]["batchyr"] = "A batchyr is required";
	} else if(!filter_var($_POST["batchyr"], $_POST["batchyr"] )) {
		$info["errors"]["batchyr"] = "batchyr is not valid";
	}

	/* validate occupation */
	if(empty($_POST["occupation"])) {
		$info["errors"]["occupation"] = "An occupation is required";
	} else if(!filter_var($_POST["occupation"], $_POST["occupation"] )) {
		$info["errors"]["occupation"] = "occupation is not valid";
	}

	/* validate validfile */
	if(!empty($_FILES['validfile']['name']))
	{
		$folder = "documents/";
		if(!file_exists($folder))
		{
			mkdir($folder, 0777, true);
			file_put_contents($folder.'index.html', 'Access denied');
		}

		$allowed = ['image/jpeg','image/png', 'document/pdf',];
		if(in_array($_FILES['validfile']['type'], $allowed))
		{
			$validfile = $folder . time() . $_FILES['validfile']['name'];
			move_uploaded_file($_FILES['validfile']['tmp_name'], $validfile);

		}else{
			$info['errors']['validfile'] = "Only validfiles of this type allowed: ".implode(", ", $allowed);
		}
	}


	if(empty($info["errors"])) {
		//save to database
		$arr = [];
		$arr["firstname"] 	= $_POST["firstname"];
		$arr["lastname"] 	= $_POST["lastname"];
		$arr["email"] 		= $_POST["email"];
		$arr["batchyr"] 		= $_POST["batchyr"];
		$arr["occupation"] 		= $_POST["occupation"];
		$arr["validfile"] 		= $_POST["validfile"];
		$image_query = "";
		if(!empty($image))
		{
			$arr['image'] = $image;
			$image_query = ",image = :image";
		}
		$arr["gender"] 		= $_POST["gender"];
		$arr["password"] 	= password_hash($_POST["password"], PASSWORD_DEFAULT);
		$arr["date"] 		= date("Y-m-d H:i:s");

		db_query("INSERT INTO users (firstname, lastname, gender, email, batchyr, occupation, validfile password, date) values (:firstname, :lastname, :gender, :email, :batchyr, :password, :date)",$arr);

		$info["success"] 	= true;
	}
