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



 <div class="down">
  

        <div class="contaillner">
            <div class="row gy-3 my-5">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                         <button type="button" class="btn btn-success">

                                            <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Primary card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                         </button>
                                </div>
                                
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <button type="button" class="btn btn-dark">
                                        <div class="card-header">Header</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Secondary card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </button>
                                </div>
                    </div>
                </div>
               
            </div>
        </div>
       
</div>
              <!-- BOX 1 -->
                <!-- Total user -->
            
  <!-- content here -->
</div>



              <!-- BOX 2 -->
                <!-- Total verified user -->
            </div>
        </div>
    </div>

    <?php require('subpage/script.php'); ?>
</body>

</html>
