# Lesson Documentation: PHP CRUD Application

## Overview

This lesson demonstrates how to create a simple PHP application that performs basic database operations: Create, Read, Update, and Delete (CRUD). The application uses a MySQL database to store user information such as names and email addresses.

---

## Files in the Project

### 1. **db_config.php**

- **Purpose**: This file is used to connect the PHP application to the MySQL database.
- **What it does**:
  - Contains the database connection details like hostname, username, password, and database name.
  - Creates a connection object (`$mysqli`) that is used in other files to interact with the database.

---

### 2. **index.php**

- **Purpose**: This file is used to insert new user data into the database.
- **What it does**:
  - Accepts user input (name and email) from a form.
  - Prepares an SQL query to insert the data into the `users` table.
  - Executes the query and shows a success or error message.
- **Key Code**:
  ```php
  $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $email);
  if ($stmt->execute()) {
      $message = '<div>Data inserted successfully!</div>';
  } else {
      $message = "Error inserting data: " . $stmt->error;
  }
  $stmt->close();
  $mysqli->close();
  ```

---

### 3. **view_data.php**

- **Purpose**: This file displays all the user records stored in the database.
- **What it does**:
  - Fetches all rows from the `users` table.
  - Displays the data in a table format on the webpage.

---

### 4. **edit.php**

- **Purpose**: This file is used to edit existing user records.
- **What it does**:
  - Fetches a specific user record based on the ID.
  - Displays the record in a form for editing.
  - Allows the user to update the data.

---

### 5. **update.php**

- **Purpose**: This file updates the user data in the database.
- **What it does**:
  - Accepts the updated data from `edit.php`.
  - Executes an SQL query to update the record in the `users` table.

---

### 6. **delete.php**

- **Purpose**: This file deletes a user record from the database.
- **What it does**:
  - Deletes a specific record based on the ID provided.

---

### 7. **style.css**

- **Purpose**: This file contains the design and layout of the application.
- **What it does**:
  - Defines the colors, fonts, and overall appearance of the web pages.

---

## Database Structure

### Table: `users`

| Column Name | Data Type | Description                      |
| ----------- | --------- | -------------------------------- |
| `id`        | INT       | Primary key, auto-incremented.   |
| `name`      | VARCHAR   | Stores the user's name.          |
| `email`     | VARCHAR   | Stores the user's email address. |

---

## How the Application Works

1. **Insert Data**:

   - Open `index.php` in your browser.
   - Fill in the form with a name and email.
   - Click the submit button to add the data to the database.

2. **View Data**:

   - Open `view_data.php` to see all the records stored in the database.

3. **Edit Data**:

   - Click the "Edit" button next to a record in `view_data.php`.
   - Modify the data in the form and save the changes.

4. **Update Data**:

   - The updated data is saved in the database using `update.php`.

5. **Delete Data**:
   - Click the "Delete" button next to a record in `view_data.php` to remove it from the database.

---

## Note:

- Always include `db_config.php` in files that need to connect to the database.
- Use simple error messages to help debug issues.
- Make sure the database credentials in `db_config.php` are correct before running the application.

---

Prepared by: Godwin Lorenz B. Llabres | Instructor 1
