<?php
include 'db_config.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Prepare the update statement
    $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
    
    // Redirect back to the view data page
    header("Location: view_data_v2.php");
    exit();
} else {
    echo "Invalid input";
}
?>