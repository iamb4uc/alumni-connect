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

function getTotaldonations() {
  $con = $GLOBALS['con'];
  $sql = "SELECT COUNT(*) AS total_rows FROM donation";

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
    echo "<table class='table text-center table-light'>";
    echo "<tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Date of Creation</th>
      <th>Batch Year</th>
      <th>Is Verified?</th>
      <th>Occupation</th>
      <th>Documents</th>
      <th>Operations</th>
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
    $docs= $row["validfile"];
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
    echo "<td><a href='$docs' target='_blank'>View File</a></td>";
    echo "<td>"; echo "<a href='update.php?id=$row[id]&fn=$row[firstname]&ln=$row[lastname]&em=$row[email]&vr=$row[is_varified]' class='link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover' onclick='return checkdelete()'>UPDATE</a>"; echo "</td>";
    echo "</tr>";
  }

  echo "</table>";
  } else {
    echo "No rows found.";
  }
}


function donationtab() {
  $con = $GLOBALS['con'];
  $sql = "SELECT * FROM donation ORDER BY transec_date DESC LIMIT 20";
  if (isset($_POST['more'])) {
    $sql = "SELECT * FROM donation ORDER BY transec_date DESC LIMIT 100";
  } if (isset($_POST['less'])) {
  $sql = "SELECT * FROM donation ORDER BY transec_date DESC LIMIT 2";
    }
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    echo "<table class='table table-dark'>";
    echo "<tr>
      <th>Donation ID</th>
      <th>User ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Amount</th>
      <th>Transection Date</th>
      </tr>";

  // Loop through each row
  while ($row = $result->fetch_assoc()) {
    // Access row data
    $ws= " ";
    $donation_id = $row["donation_id"];
    $id = $row["id"];
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $amount = $row["amount"];
    $transecDate = $row["transec_date"];
    /* $verified = $row["is_varified"]; */
    // Output the row data in a table row
    echo "<tr>";
    echo "<td>$donation_id</td>";
    echo "<td>$id</td>";
    echo "<td>$fname$ws$lname</td>";
    echo "<td>$email</td>";
    echo "<td>$amount</td>";
    echo "<td>$transecDate</td>";
  }

  echo "</table>";
  } else {
    echo "No rows found.";
  }
}


function dispContent() {
  $con = $GLOBALS['con'];
  $sql = "SELECT * FROM about ORDER BY about_id";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    echo "<table class='table text-center table-light'>";
    echo "<tr>
      <th>Content Type</th>
      <th>Text</th>
      <th>Links</th>
      <th>Last Updated</th>
      <th>Operations</th>
      </tr>";

  // Loop through each row
  while ($row = $result->fetch_assoc()) {
    // Access row data
    $id = $row["about_id"];
    $ws= " ";
    $content = $row["content"];
    $text = $row["text"];
    $link = $row["link"];
    $date = $row["update_date"];

    // Output the row data in a table row
    echo "<tr>";
    echo "<td>$content</td>";
    echo "<td>$text</td>";
    echo "<td>$link</td>";
    echo "<td>$date</td>";
    echo "<td>"; echo "<a href='update-content.php?id=$row[about_id]&content=$row[content]&text=$row[text]&link=$row[link]&date=$row[update_date]' class='link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>UPDATE</a>"; echo "</td>";
    echo "</tr>";
  }

  echo "</table>";
  } else {
    echo "No rows found.";
  }
}
