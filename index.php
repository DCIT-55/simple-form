<?php
   include 'db_config.php';

    $message = '';

    // Handling form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];

        // Prepare the SQL statement
        $insertUserStmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        
        // Bind parameters
        $insertUserStmt->bind_param("ss", $userName, $userEmail);

        // Execute the statement
        if ($insertUserStmt->execute()) {
            $message = '<div style="padding: 10px; margin: 10px 0; border: 1px solid #4CAF50; background-color: #dff0d8; color: #3c763d; border-radius: 4px;">
                            Success: Data has been inserted.
                        </div>';
        } else {
            $message = '<div style="padding: 10px; margin: 10px 0; border: 1px solid #f44336; background-color: #f2dede; color: #a94442; border-radius: 4px;">
                            Error: ' . $insertUserStmt->error . '
                        </div>';
        }

        // Close the statement
        $insertUserStmt->close();
    }

    // Closing the connection
    $mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            box-sizing: border-box;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
            margin: 20px auto;
        }

        .view-data-link {
            text-align: right;
            margin-top: 20px;
        }

        .view-data-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .view-data-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
    <div class="view-data-link">
        <a href="view_data_v2.php" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">View Data</a>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Submit Your Information</h1>
        
    </div>
    
        <?php echo $message; ?>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Submit">
        </form>


    
    </div>


</body>
</html>