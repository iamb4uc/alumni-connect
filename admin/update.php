<?php
include './subpage/db_config.php';
include './subpage/essential.php';
adminLogin(); #For checking if user is login user or unauthorized  user
error_reporting(0);
$id=$_GET['id'];
$fname=$_GET['fn'];
$lname=$_GET['ln'];
$email=$_GET['em'];
$is_verified=$_GET['vr'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Users</title>
    <?php require('subpage/links.php');
    ?>
</head>

<body class="bg-light">

    <?php require('subpage/header.php'); ?>
    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
<h2>User Credential update/verification form</h2>
    <form method="GET">
      <div class="form-group mb-4">
        <label for="id">Id:</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="fname">Firstname:</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="lname">Lastname:</label>
        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $lname; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="fname">Email:</label>
        <input type="email" class="form-control" id="fname" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="verified">Is Verified?:</label>
        <select name="verified" class="form-control" id="verified">
          <option value="1" <?php if ($is_verified == 1) echo 'selected'; ?>>Verify user</option>
          <option value="0" <?php if ($is_verified == 0) echo 'selected'; ?>>Unverify</option>
        </select>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
      </div>
    </div>

    <?php require('./subpage/script.php'); ?>
</body>

</html>

<?php
if (isset($_GET['submit'])) {
  $con = $GLOBALS['con'];
  $id=$_GET['id'];
  $fn=$_GET['fname'];
  $ln=$_GET['lname'];
  $verify=$_GET['verified'];
  $query="UPDATE users SET id='$id', firstname='$fn', lastname='$ln', is_varified='$verify' WHERE id='$id'";
  $data=mysqli_query($con,$query);
  if ($data) {
    echo"<script>alert('Record Updated')</script>";
?>
<meta http-equiv="refresh" content="0; url=dashboard.php">
<?php
  } else {
    echo"<script>alert('Record Not Updated')</script>";
  }
}
?>
