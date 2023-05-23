<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'final_alumni';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
  die("Sorry can't Connect to database" . mysqli_connect_error());
}


function filteration($data) {
  foreach ($data as $key => $value) {
    $data[$key] = trim($value);
    $data[$key] = stripcslashes($value);
    $data[$key] = htmlspecialchars($value);
    $data[$key] = strip_tags($value);
  }
  return $data;
}


function select($sql, $values, $datatypes) {
  $con = $GLOBALS['con'];
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_get_result($stmt);
      mysqli_stmt_close($stmt);
      return $res;
    } else {
      mysqli_stmt_close($stmt);
      die("Query cannot be executet- Select function");
    }
  } else {
    die("Query cannot be prepared- Select function");
  }
}

function getTotalusers() {
  $con = $GLOBALS['con'];
  $sql = "SELECT COUNT(*) AS total_rows FROM users";

  $result = $con->query($sql);
  // Fetch the result
  $row = $result->fetch_assoc();

  // Access the total_rows value
  $totalRows = $row['total_rows'];

  // Display the total number of rows
  echo $totalRows;

}

function totvusers() {
  $con = $GLOBALS['con'];
  $sql = "SELECT COUNT(*) AS total_rows FROM users WHERE is_varified = 1";

  $result = $con->query($sql);
  // Fetch the result
  $row = $result->fetch_assoc();

  // Access the total_rows value
  $totalRows = $row['total_rows'];

  // Display the total number of rows
  echo $totalRows;

}

function getTotaladmins() {
  $con = $GLOBALS['con'];
  $sql = "SELECT COUNT(*) AS total_rows FROM admin_cred";

  $result = $con->query($sql);
  // Fetch the result
  $row = $result->fetch_assoc();

  // Access the total_rows value
  $totalRows = $row['total_rows'];

  // Display the total number of rows
  echo $totalRows;
}



function usertab() {
  $con = $GLOBALS['con'];
  $sql = "SELECT * FROM users ORDER BY date DESC LIMIT 20";
  if (isset($_POST['more'])) {
    $sql = "SELECT * FROM users ORDER BY date DESC LIMIT 100";
  } if (isset($_POST['less'])) {
  $sql = "SELECT * FROM users ORDER BY date DESC LIMIT 2";
    }
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    echo "<table class='table table-sm text-center table-dark'>";
    echo "<tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Date of Creation</th>
      <th>Batch Year</th>
      <th>Is Verified?</th>
      <th>Occupation</th>
      <th colspan='2'>Operations</th>
      </tr>";

  // Loop through each row
  while ($row = $result->fetch_assoc()) {
    // Access row data
    $id = $row["id"];
    $ws= " ";
    $fname = $row["firstname"];
    $lname = $row["lastname"];
    $email = $row["email"];
    $gender = $row["gender"];
    $creationDate = $row["date"];
    $batchyr = $row["batchyr"];
    /* $verified = $row["is_varified"]; */
    if ($row["is_varified"]==0) {
      $verified = "Not Verified";
    } else {
      $verified = "Verified";
    }
    $occupation = $row["occupation"];

    // Output the row data in a table row
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$fname$ws$lname</td>";
    echo "<td>$email</td>";
    echo "<td>$gender</td>";
    echo "<td>$creationDate</td>";
    echo "<td>$batchyr</td>";
    echo "<td>$verified</td>";
    echo "<td>$occupation</td>";
    echo "<td>"; echo "<a href='update.php?id=$row[id]&fn=$row[firstname]&ln=$row[lastname]&em=$row[email]&vr=$row[is_varified]' onclick='return checkdelete()'>EDIT/UPDATE</a>"; echo "</td>";
    echo "</tr>";
  }

  echo "</table>";
  } else {
    echo "No rows found.";
  }
}
