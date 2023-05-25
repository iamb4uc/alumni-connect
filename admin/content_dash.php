<?php
require 'subpage/essential.php' ;

require 'subpage/db_config.php';
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Dashboard</title>
    <?php require('subpage/links.php');
    ?>
</head>

<body class="bg-light">

    <?php require('subpage/header.php'); ?>
    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <div class="row">
            <div class="col-sm-4">
          <!-- Document Body -->


            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require('subpage/script.php'); ?>
</body>

</html>

<?php
?>
