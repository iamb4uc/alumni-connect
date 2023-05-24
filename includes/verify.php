<?php

/* image validation */
if(!empty($_FILES['file']['name'])) {
  $folder = "../uploads/documents/";
  if(!file_exists($folder)) {
    mkdir($folder, 0777, true);
    file_put_contents($folder.'index.html', 'Access denied');
  }

  $allowed = array('image/jpeg', 'image/png', 'application/pdf');
  if(in_array($_FILES['file']['type'], $allowed)) {
    $file = $folder . time() . $_FILES['image']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $file);

  } else {
    $info['errors']['image'] = "Only images of this type allowed: ".implode(", ", $allowed);
  }
}


if(empty($info['errors']) && $row) {
  $arr = [];
  $arr['id'] = $row['id'];
  $arr['validfile'] = $file;

  db_query("UPDATE users SET validfile = :validfile WHERE id = :id LIMIT 1",$arr);

  $row = db_query("SELECT * FROM users where id = :id limit 1",['id'=>$row['id']]);
  if($row) {
    $row = $row[0];
    $_SESSION['PROFILE'] = $row;
  }

  $info['success'] 	= true;
}

