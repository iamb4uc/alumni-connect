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

if ($row["is_varified"] == 0) {
  redirect('home.php');
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

    <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg bg-light mb-5">
      <div class="h1 text-center">Edit Profile</div>
      <div class="col-md-4 text-center">
        <img src="<?= get_image($row['image']) ?>" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
        <div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Click below to select an image</label>
            <input onchange="display_image(this.files[0])" class="js-image-input form-control" type="file" id="formFile">
          </div>
          <div><small class="js-error js-error-image text-danger"></small></div>
        </div>
      </div>
      <div class="col-md-8">


        <form method="post" onsubmit="myaction.collect_data(event, 'profile-edit')">
          <table class="table table-striped">
            <tr>
              <th colspan="2">User Details:</th>
            </tr>
            <tr>
              <th>Email</th>
              <td>
                <input value="<?= $row['email'] ?>" type="text" class="form-control" name="email" placeholder="Email">
                <div><small class="js-error js-error-email text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>First name</th>
              <td>
                <input value="<?= $row['firstname'] ?>" type="text" class="form-control" name="firstname" placeholder="First name">
                <div><small class="js-error js-error-firstname text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Last name</th>
              <td>
                <input value="<?= $row['lastname'] ?>" type="text" class="form-control" name="lastname" placeholder="Last name">
                <div><small class="js-error js-error-lastname text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Gender</th>
              <td>
                <select name="gender" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                  <option value="">--Select Gender--</option>
                  <option <?php if ($is_verified == 'Male') echo 'selected'; ?> value="Male">Male</option>
                  <option <?php if ($is_verified == 'Female') echo 'selected'; ?> value="Female">Female</option>
                  <option <?php if ($is_verified == 'Others') echo 'selected'; ?> value="Others">Others</option>
                </select>
                <div><small class="js-error js-error-gender text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Batch Year</th>
              <td>
                <input value="<?= $row['batchyr'] ?>" type="text" class="form-control" name="batchyr" placeholder="ex: 2000">
                <div><small class="js-error js-error-batchyr text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Occupation</th>
              <td>
                <input value="<?= $row['occupation'] ?>" type="text" class="form-control" name="occupation" placeholder="ex: Teacher">
                <div><small class="js-error js-error-occupation text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Bio</th>
              <td>
                <input value="<?= $row['bio'] ?>" type="text" class="form-control" name="bio">
                <div><small class="js-error js-error-bio text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Department</th>
              <td>
                <input value="<?= $row['department'] ?>" type="text" class="form-control" name="department">
                <div><small class="js-error js-error-department text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <input type="password" class="form-control" name="password" placeholder="Password (leave empty to keep old password)">
                <div><small class="js-error js-error-password text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Retype Password</th>
              <td>
                <input type="password" class="form-control" name="retype_password" placeholder="Retype Password">
              </td>
            </tr>

          </table>

          <hr>
          <table class="table table-striped">
            <tr>
              <th colspan="2">Social Links:</th>
            </tr>
            <tr>
              <th>Facebook</th>
              <td>
                <input value="<?= $row['facebook'] ?>" type="text" class="form-control" name="facebook" placeholder="https://facebook.com/user/xyz">
                <div><small class="js-error js-error-facebook text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Twitter</th>
              <td>
                <input value="<?= $row['twitter'] ?>" type="text" class="form-control" name="twitter" placeholder="https://twitter.com/user">
                <div><small class="js-error js-error-twitter text-danger"></small></div>
              </td>
            </tr>
            <tr>
              <th>Linkedin</th>
              <td>
                <input value="<?= $row['linkedin'] ?>" type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com/user">
                <div><small class="js-error js-error-linkedin text-danger"></small></div>
              </td>
            </tr>
          </table>
          <div class="progress my-3 d-none">
            <div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
          </div>

          <div class="p-2">

            <button class="btn btn-primary float-end">Save</button>

            <a href="home.php"><label class="btn btn-secondary">Back</label></a>

          </div>
        </form>

      </div>
    </div>

  <?php else : ?>
    <div class="text-center alert alert-danger">That profile was not found</div>
    <a href="index.php">
      <button class="btn btn-primary m-4">Home</button>
    </a>
  <?php endif; ?>

  <?php include 'defaults/footer.php'; ?>
</body>

</html>

<script>
  var image_added = false;

  function display_image(file) {
    var img = document.querySelector(".js-image");
    img.src = URL.createObjectURL(file);

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
        myform.append('image', document.querySelector('.js-image-input').files[0]);
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
