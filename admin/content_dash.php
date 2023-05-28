<?php
require 'subpage/essential.php';

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
  <style>
    .custom-css {
      font-family: "Sora", sans-serif;
      line-height: 1.7;
      color: var(--dark);
      background: linear-gradient(-45deg, #EE7252, #E74C7E, #23A6D5, #22D5AB);
    }
  </style>
  <?php require('subpage/links.php');
  ?>
</head>

<body class="custom-css">

  <?php require('subpage/header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <!-- Document Body -->
        <div class="table">
          <h1>User Table</h1>
          <?php dispContent(); ?>
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