<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>


	<div class="hero vh-100 d-flex align-items-center" id="home">
		<div class="container">
			<div class="row ">
				<form method="post" onsubmit="myaction.collect_data(event, 'login')">
					<div class="col-md-4 border rounded mx-auto mt-5 p-4 shadow">

						<div class="h2 text-light mb-3">Login</div>

						<div><small class="my-1 js-error js-error-email text-danger"></small></div>

						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
							<input name="email" type="text" class="form-control p-3" placeholder="Email">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
							<input name="password" type="password" class="form-control p-3" placeholder="Password">
						</div>

						<div class="progress my-3 d-none">
							<div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
						</div>

						<button class="btn btn-primary col-12 ">Login</button>
						<div class="text-center text-light">
							<br>
							Dont have an account? <a href="signup.php" class="text-info">SIGNUP HERE</a>
						</div>
						<br>
						<br>
						<div class="text-center ">
							<a href="./admin/index.php" class="text-black btn btn-info" style="text-decoration: none;">ADMIN LOGIN</a>
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>
	</div>
	<!-- <form method="post" onsubmit="myaction.collect_data(event, 'login')">
		<div class="col-md-4 border rounded mx-auto mt-5 p-4 shadow">

			<div class="h2">Login</div>

			<div><small class="my-1 js-error js-error-email text-danger"></small></div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
				<input name="email" type="text" class="form-control p-3" placeholder="Email">
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
				<input name="password" type="password" class="form-control p-3" placeholder="Password">
			</div>

			<div class="progress my-3 d-none">
				<div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
			</div>

			<button class="btn btn-primary col-12">Login</button>
			<div class="text-center">
				<br>
				Dont have an account? <a href="signup.php">SIGNUP HERE</a>
			</div>
			<br>
			<br>
			<div class="text-center ">
				<a href="./admin/index.php" class="text-black btn btn-info" style="text-decoration: none;">ADMIN LOGIN</a>
			</div>
		</div>
	</form> -->

</body>

</html>

<script>
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
				alert("Login successfull!");
				window.location.href = 'index.php';
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