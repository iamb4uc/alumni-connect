<?php

$arr = [];
$arr['email'] = $_POST['email'];

$row = db_query("select * from `users` where email = :email limit 1", $arr);

if(is_array($row) && count($row) > 0) {
  $row = $row[0];

  if(password_verify($_POST['password'], $row['password'])) {
    $info['success'] 	= true;
    $_SESSION['PROFILE'] = $row;
  } else {
    $info['errors']['email'] = "Wrong email or password1";
  }
} else {
  $info['errors']['email'] = $row;
}
