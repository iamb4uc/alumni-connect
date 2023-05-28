<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <!-- <img class="logo" src="img/demo colge 2.png" alt=""> -->
            <h5>Karimganj College</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Our Alumnis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#about">About US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contact">Contact</a>
                </li>
                <?php
                require_once 'functions.php';
                if (!is_logged_in()) {
                    echo "<li class='nav-item'>";
                    echo "  <button type='button' class='btn btn-danger'><a href='login.php' class='badge badge-danger'>Login</a></button>";
                    echo "</li>";
                }
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <?php require_once 'functions.php';
                        error_reporting(0);
                        $id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

                        $row = db_query("select * from users where id = :id limit 1", ['id' => $id]);

                        if ($row) {
                            $row = $row[0];
                        }
                        echo $row['firstname'] . ' ' . $row['lastname']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="home.php">My profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="profile-delete.php">Delete Profile</a></li>
                    </ul>
                </li>
            </ul>
            <div>
            </div>

        </div>
    </div>
</nav>
