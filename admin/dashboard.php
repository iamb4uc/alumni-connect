<?php
require('subpage/essential.php');
adminLogin(); #For checking if user is login user or unauthorized  user
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('subpage/links.php');
    ?>
</head>

<body class="bg-light">

    <?php require('subpage/header.php'); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
              <!-- Document Body -->
              <!-- BOX 1 -->
                <!-- Total user -->
              <!-- BOX 2 -->
                <!-- Total verified user -->
            </div>
        </div>
    </div>

    <?php require('subpage/script.php'); ?>
</body>

</html>
