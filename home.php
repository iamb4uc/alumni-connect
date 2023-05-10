<?php

require 'functions.php';

if (!is_logged_in()) {
    redirect('login.php');
}

$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

$row = db_query("select * from users where id = :id limit 1", ['id' => $id]);

if ($row) {
    $row = $row[0];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?= include 'defaults/navbar.php';  ?>

    <section>
        <?php if (!empty($row)) : ?>
            <div class="row col-lg-8 border rounded mx-auto p-2 shadow-lg ">
                <div class="col-md-4 text-center mt-5">
                    <img src="<?= get_image($row['image']) ?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
                    <div>

                        <?php if (user('id') == $row['id']) : ?>

                            <a href="profile-edit.php">
                                <button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
                            </a>
                            <a href="profile-delete.php">
                                <button class="mx-auto m-1 btn-sm btn btn-warning text-white">Delete</button>
                            </a>
                            <a href="logout.php">
                                <button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="h2">User Profile</div>
                    <table class="table table-striped">
                        <tr>
                            <th colspan="2">User Details:</th>
                        </tr>
                        <tr>
                            <th><i class="bi bi-envelope"></i> Email</th>
                            <td><?= esc($row['email']) ?></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-person-circle"></i> First name</th>
                            <td><?= esc($row['firstname']) ?></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-person-square"></i> Last name</th>
                            <td><?= esc($row['lastname']) ?></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                            <td><?= esc($row['gender']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center alert alert-danger">That profile was not found</div>
            <a href="index.php">
                <button class="btn btn-primary m-4">Home</button>
            </a>
        <?php endif; ?>
    </section>




    <?php include 'defaults/footer.php'; ?>

</body>

</html>