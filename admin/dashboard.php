<?php
require 'subpage/essential.php' ;
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
          <div class="row">
            <div class="col-sm-4">
              <div class="card text-white bg-primary mb-4 text-center" style="max-width: 28rem;">
                <div class="card-body">
                  <h5 class="card-title">TOTAL USERS</h5>
                  <p class="card-text"><?php require 'subpage/db_config.php'; getTotalusers(); ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-white bg-primary mb-4 text-center" style="max-width: 28rem;">
                <div class="card-body">
                  <h5 class="card-title">TOTAL Verified USERS</h5>
                  <p class="card-text"><?php totvusers(); ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-white bg-secondary mb-4 text-center" style="max-width: 28rem;">
                <div class="card-body">
                  <h5 class="card-title">TOTAL ADMINS</h5>
                  <p class="card-text"><?php getTotaladmins(); ?></p>
                </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container-fluid" id="main-content">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <div class="row">
              <div class="table">
                <h1>Recently created users</h1>
                <?php usertab(); ?>
            <form method='POST'>
            <input type='submit' name='more' class="btn btn-secondary" value='Show More'>
            <input type='submit' name='less' class="btn btn-primary" value='Show Less'>
            </form>
              </div>
          </div>
        </div>
        </div>
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
