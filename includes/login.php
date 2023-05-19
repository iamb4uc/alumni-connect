<?php


$arr = [];
	$arr['email'] = $_POST['email'];

 	$row = db_query("select * from users where email = :email limit 1",$arr);

	if(!empty($row))
	{
		$row = $row[0];

		//check the password
    $trimmed_hash = substr($row['password'], 0, 60);
    if (password_verify($_POST['password'], $trimmed_hash)) {
			//password correct
			$info['success'] 	= true;
			$_SESSION['PROFILE'] = $row;
		} else {
			$info['errors']['email'] = "sdkfjslkdjf";
		}

	}else
	{
		$info['errors']['email'] = "Wrong email or password";
	}




/* ARCHIVED  */

/* if ($_SERVER['REQUEST_METHOD'] === 'POST') { */
/*     // Retrieve email and password from the form */
/*     $email = $_POST['email']; */
/*     $password = $_POST['password']; */
/**/
/*     // Validate email and password */
/*     if (empty($email)) { */
/*         $info['errors']['email'] = 'Email is required'; */
/*     } */
/*     if (empty($password)) { */
/*         $info['errors']['password'] = 'Password is required'; */
/*     } */
/**/
/*     // If there are no validation errors, attempt to authenticate the user */
/*     if (empty($info['errors'])) { */
/*         // Query the database to check if the email exists */
/*         $rows = db_query("SELECT * FROM users WHERE email = :email LIMIT 1", ['email' => $email]); */
/**/
/*         if (is_countable($rows) && count($rows) == 0) { */
/*             $info['errors']['email'] = 'Email not registered'; */
/*         } else { */
/*             // Email exists, verify the password */
/*             $row = $rows[0] ?? null; // Use the null coalescing operator to handle empty result */
/*             if ($row && password_verify($password, $row['password'])) { */
/*                 // Authentication successful */
/*                 $info['success'] = true; */
/*                 // Add any additional data you want to include in the response */
/*                 $info['message'] = 'Login successful'; */
/*             } else { */
/*                 // Incorrect password */
/*                 $info['errors']['password'] = 'Incorrect password'; */
/*             } */
/*         } */
/*     } */
/* } */
/**/
/* // Check if the email entered by the user exists in the database */
/* if (is_countable($rows) && count($rows) == 0) { */
/*     $info['errors']['email'] = "Email not registered"; */
/* } */
