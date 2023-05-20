<?php

session_start();



/* ---------------------- OLD SHIT THAT IS SUPPOSED TO BREAK THE LOGIN ---------------------- */
/* function db_query(string $query, array $data = array()) { */
/* 	$string = "mysql:host=localhost;dbname=final_alumni"; */
/* 	$con = new PDO($string, 'root', ''); */
/**/
/* 	$stm = $con->prepare($query); */
/* 	$check = $stm->execute($data); */
/*   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
/**/
/* 	return $check; */
/* } */
/* ------------------------------------------------------------------------------------------ */


function db_query(string $query, array $data = array()) {
    $string = "mysql:host=localhost;dbname=final_alumni";
    $con = new PDO($string, 'root', '');

    $stm = $con->prepare($query);
    $stm->execute($data);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function is_logged_in(): bool {
	if (!empty($_SESSION['PROFILE'])) {
		return true;
	}
	return false;
}

function redirect($path): void {
	header("Location: $path");
	die;
}

function esc(string $str): string {
	return htmlspecialchars($str);
}

function escnew(int $num): string {
	return strval($num);
}

function get_image($path = ''): string {
	if (file_exists($path)) {
		return $path;
	}
	return './images/no-image.jpg';
}

function user(string $key = '') {
	if (is_logged_in()) {
		if (!empty($_SESSION['PROFILE'][$key])) {
			return $_SESSION['PROFILE'][$key];
		}
	}
	return false;
}

/* -- POST TRAUMA CHANGES -- */

function fetch_occupation() {
  // Start the session
  $id = $_SESSION['PROFILE'];

  if (isset($id)) {
    $query = "SELECT occupation FROM users WHERE id = :id";
    $data = array(':id' => $id);

    $results = db_query($query, $data);

    if (!empty($results)) {
      $occupation = $results[0]['occupation'];
      // Perform any desired actions with the occupation value
      echo "Occupation: " . $occupation . "<br>";
    } else {
      echo "No occupation found for the profile.";
    }
  } else {
    echo "Profile identifier not found.";
  }
}


/* function getFacebookLink() */
/* { */
/*     // Assuming the user ID is stored in $_SESSION['PROFILE']['id'] */
/*     $id = $_SESSION['PROFILE']['id']; */
/**/
/*     // Fetch the Facebook link from the database for the logged-in user */
/*     $query = ("SELECT facebook FROM users WHERE id = :id", $id); */
/*     $data = array($id); */
/*     $result = db_query($query, $data); */
/**/
/*     if (!empty($result)) { */
/*         $facebookLink = $result[0]['facebook']; */
/*         return $facebookLink; */
/*     } */
/**/
/*     return null; */
/* } */
/**/
/* // Function to fetch Twitter link for the logged-in user */
/* function getTwitterLink() */
/* { */
/*     // Assuming the user ID is stored in $_SESSION['PROFILE']['id'] */
/*     $id = $_SESSION['PROFILE']['id']; */
/**/
/*     // Fetch the Twitter link from the database for the logged-in user */
/*     $query = "SELECT twitter FROM users WHERE id = ?"; */
/*     $data = array($id); */
/*     $result = db_query($query, $data); */
/**/
/*     if (!empty($result)) { */
/*         $twitterLink = $result[0]['twitter']; */
/*         return $twitterLink; */
/*     } */
/**/
/*     return null; */
/* } */
/**/
/* // Function to fetch LinkedIn link for the logged-in user */
/* function getLinkedInLink() */
/* { */
/*     // Assuming the user ID is stored in $_SESSION['PROFILE']['id'] */
/*     $id = $_SESSION['PROFILE']['id']; */
/**/
/*     // Fetch the LinkedIn link from the database for the logged-in user */
/*     $query = "SELECT linkedin FROM users WHERE id = ?"; */
/*     $data = array($id); */
/*     $result = db_query($query, $data); */
/**/
/*     if (!empty($result)) { */
/*         $linkedinLink = $result[0]['linkedin']; */
/*         return $linkedinLink; */
/*     } */
/**/
/*     return null; */
/* } */
