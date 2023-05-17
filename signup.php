<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

	<form method="post" onsubmit="myaction.collect_data(event, 'signup')">
		<div class="col-md-12 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">

			<div class="h2">Signup</div>

			<div class="col-md-12 mt-3">
				<input name="firstname" type="text" class="form-control p-3" placeholder="First name">
			</div>
			<div><small class="js-error js-error-firstname text-danger"></small></div>

			<div class="col-md-12 mt-3">
				<input name="lastname" type="text" class="form-control p-3" placeholder="Last name">
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>

			<div class="input-group mt-3">
				<select class="form-select" name="gender">
					<option selected value="">--Select Gender--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Female">Others</option>
				</select>
			</div>
			<div><small class="js-error js-error-gender text-danger"></small></div>

			<div class="col-md-12 mt-3">
				<input name="email" type="text" class="form-control p-3" placeholder="Email">
			</div>
      <div><small class="js-error js-error-email text-danger"></small></div>

      <div class="col-md-12 mt-3">
				<input name="batchyr" type="number" class="form-control p-3" placeholder="Batch Year">
			</div>
      <div><small class="js-error js-error-calendar text-danger"></small></div>

			<div class="col-md-12 mt-3">
				<input name="occupation" type="text" class="form-control p-3" placeholder="Occupation">
			</div>
      <div><small class="js-error js-error-calendar text-danger"></small></div>

			<div class="col-md-12 mt-3">
<label class="form-label">Provide a validation file</label>
				<input name="validfile" type="file" class="form-control p-3" placeholder="slkdfjskldjf">
			</div>
      <div><small class="js-error js-error-calendar text-danger"></small></div>

			<div class="col-md-12 ps-0 mt-3">
				<input name="password" type="password" class="form-control p-3" placeholder="Password">
			</div>
			<div><small class="js-error js-error-password text-danger"></small></div>

			<div class="col-md-12 ps-0 mt-3">
				<input name="retype_password" type="password" class="form-control p-3" placeholder="Retype Password">
			</div>

			<div class="progress mt-3 d-none">
				<div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
			</div>

			<button class="mt-3 btn btn-primary col-12">Signup</button>
			<div class="m-2">
				Already have an account? <a href="login.php">LOGIN HERE</a>
			</div>

		</div>
	</form>

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
				alert("Profile created successfully");
				window.location.href = 'login.php';
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
