<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "/backend/db_config.php";

    // Prepare the SQL statement with placeholders for the user input
    $stmt = $conn->prepare("INSERT INTO userinfo (fname, lname, email, password) VALUES (?, ?, ?, ?)");

    // Bind the user input to the placeholders in the SQL statement
    $stmt->bind_param("ssss", $fname, $lname, $email, $password);

    // Set the user input variables from the POST data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        $_SESSION["success"] = "Registration successful! Please login.";
        header("Location: /subpages/login.php");
        exit();
    } else {
        // Error occurred, show error message
        $_SESSION["error"] = "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <?php
    // Show any error or success messages
    if (isset($_SESSION["error"])) {
        echo "<p style='color: red;'>".$_SESSION["error"]."</p>";
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) {
        echo "<p style='color: green;'>".$_SESSION["success"]."</p>";
        unset($_SESSION["success"]);
    }
    ?>
    <h1>User Registration</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
<a href="/subpages/login.php" /> login</a>
    </form>
</body>
</html>

