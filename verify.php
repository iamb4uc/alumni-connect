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
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<?= include 'defaults/navbar.php'; ?>
	<?php if (!empty($row)) : ?>

		<div class="row col-lg-8 border rounded mx-auto mt-5 mb-5 bg-light p-2 shadow-lg">
			<div class="h1 text-center">Upload document</div>
			<div class="mb-3">
				<form method="post" onsubmit="myaction.collect_data(event, 'verify')">
					<label for="formFile" class="form-label">Click below to select an image</label>
					<input onchange="display_image(this.files[0])" class="js-image-input form-control" type="file" id="formFile">
					<div class="progress my-3 d-none">
						<div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
					</div>

					<div class="p-2">

						<button class="btn btn-primary float-end">Save</button>

						<a href="home.php"><label class="btn btn-secondary">Back</label></a>

					</div>
				</form>
			</div>
			<div>
				<small class="js-error js-error-file text-danger"></small>
			</div>
		</div>
		</div>

	<?php else : ?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif; ?>

	<?php include "defaults/footer.php"; ?>
</body>

</html>

<script>
	var image_added = false;

	function display_image(file) {
		image_added = true;
	}

	var myaction = {
		collect_data: function(e, data_type) {
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type', data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			if (image_added) {
				myform.append('file', document.querySelector('.js-image-input').files[0]);
			}

			myaction.send_data(myform);
		},

		send_data: function(form) {

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function() {

				if (ajax.readyState == 4) {
					if (ajax.status == 200) {
						//all good
						myaction.handle_result(ajax.responseText);
					} else {
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e) {

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post', 'ajax.php', true);
			ajax.send(form);
		},

		handle_result: function(result) {
			console.log(result);
			var obj = JSON.parse(result);
			if (obj.success) {
				alert("Profile edited successfully");
				window.location.reload();
			} else {

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for (key in obj.errors) {
					document.querySelector(".js-error-" + key).innerHTML = obj.errors[key];
				}
			}
		}
	};
</script>