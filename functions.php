
/*         THIS FILE CONTAINS ALL THE FUNCTIONS           */
/*         REQUIRED BY THE CLIENT SIDE OF THE             */
/*         PROJECT AND ALL IS RESPONSIBLE FOR             */
/*         CARRYING OUT THE MOTHERFUCKING QUERIES         */
/*         FOR THE USES AS WELL AS OTHER ASSOCIATIVE      */
/*         FILES. R AMI PROJECT KORRAM NA RE BHAI         */
/*                                                        */
/*               ---- SWAPNIL                             */
/*                                                        */

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
