<?php
require('subpage/essential.php');
require('subpage/db_config.php');


// session_start();
// if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
//     redirect('dashboard.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <?php
    require('subpage/links.php');
    ?>

    <style>
        /* login form css */
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }

        .custom-css {
            font-family: "Sora", sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background: linear-gradient(-45deg, #EE7252, #E74C7E, #23A6D5, #22D5AB);
        }
    </style>
</head>

<body class="custom-css">
    <!--Start Admin login Form -->
    <div class="login-form text-center rounded custom-css shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="admin_login" type="submit" class="btn text-white custom-bg shadow-none">Login</button>
                <a href="../index.php" class="text-info" style="text-decoration: none;">back</a>
            </div>
        </form>
    </div>
    <!-- end Login Form -->



    <?php
    if (isset($_POST['admin_login'])) {
        $frm_data = filteration($_POST); // call function form db_config.php

        $query = "SELECT * FROM `admin_cred` WHERE `admin_name` =? AND `admin_pass` =? ";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

        $res = select($query, $values, "ss");
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['sr_no'];
            redirect('dashboard.php');
        } else {
            alert('error', 'Login failed - Invalid Credentials!');
        }
    }
    ?>



    <?php require('subpage/script.php'); ?>
</body>

</html>