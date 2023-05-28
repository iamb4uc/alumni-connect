<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Your database connection code here
    $con = $GLOBALS['con'];

    // Update the value for the current row
    $updateSql = "UPDATE users SET is_varified = 1 WHERE id = $id";
    if ($con->query($updateSql) !== TRUE) {
        echo "Error updating value for row with ID $id: " . $con->error;
    } else {
        echo "User with ID $id has been verified.";
    }
}
?>
