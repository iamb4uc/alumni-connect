<?php
include_once 'subpage/db_config.php';
include 'subpage/essential.php';
adminLogin(); #For checking if user is login user or unauthorized  user
error_reporting(0);
$id=$_GET['id'];
$content=$_GET['content'];
$text=$_GET['text'];
$link=$_GET['link'];

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
        <h2>Update <?php echo $content; ?> Form</h2>
    <form method="GET">
      <div class="form-group mb-4">
        <label for="id">Id:</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="content">Content:</label>
        <input type="text" class="form-control" id="content" name="content" value="<?php echo $content; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="text">Text:</label>
        <input type="text" class="form-control" name="text" id="text" value="<?php echo $text; ?>">
      </div>
      <div class="form-group mb-4">
        <label for="link">Link:</label>
        <input type="link" class="form-control" id="link" name="link" value="<?php echo $link; ?>">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
      </div>
    </div>

    <?php require('subpage/script.php'); ?>
</body>

</html>

<?php
include_once 'subpage/db_config.php';

if (isset($_GET['submit'])) {
  $con = $GLOBALS['con'];
  $id=$_GET['id'];
  $content=$_GET['content'];
  $text=$_GET['text'];
  $link=$_GET['link'];
  $date = date("Y-m-d");
  $statement="UPDATE about SET content=$content,text=$text,link=$link,update_date=$date WHERE about_id='$id'";
  $data=mysqli_query($con,$statement);
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
