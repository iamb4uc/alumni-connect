<?php

require 'functions.php';

if (!is_logged_in()) {
	redirect('login.php');
}

$rows = db_query("select * from users");


?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/boxicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<link rel="stylesheet" href="css/event.css">



	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link rel="stylesheet" href="css/style.css">
	<title>Our Alumni</title>
</head>

<body>
	<?= include 'defaults/navbar.php'; ?>
	<div class="container mb-5">
		<div class="row mb-5">
			<div class="col-md-8 mx-auto text-center">
        <h1>Meet Our Alumni</h1>
        <p>Meet our esteemed alumni from all the departments of this college.</p>
			</div>
		</div>
		<div class="row text-center g-4">
			<?php if (!empty($rows)) : ?>
				<?php foreach ($rows as $row) : ?>
			    <?php if ($rows[0]['is_varified'] !== 0) : ?>
					<div class="col-lg-3 col-sm-6">
						<div class="team-member card-effect">
							<img src="<?= get_image($row['image']) ?>" alt="">
							<h5 class="mb-0 mt-4"><?= esc($row['firstname']) ?> <?= esc($row['lastname']) ?></h5>
              <p><? esc($row['occupation']) ?></p>
							<div class="social-icons">
              <a href="<?= esc($row['facebook']) ?>"><i class="bi bi-facebook"></i></i></a>
								<a href="<?= esc($row['twitter']) ?>"><i class="bi bi-twitter"></i></a>
								<a href="<?= esc($row['linkedin']) ?>"><i class="bi bi-linkedin"></i></i></a>
							</div>
						</div>
					</div>
      <?php else : ?>
        <?php echo"no shit" ?>
			<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="text-center alert alert-danger">That profile was not found</div>
				<a href="index.php">
					<button class="btn btn-primary m-4">Home</button>
				</a>
			<?php endif; ?>
		</div>
	</div>


	<?php include 'defaults/footer.php'; ?>
</body>

</html>
