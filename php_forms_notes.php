<?php
/*
=============================================
PHP Notes & Examples: Forms and Data Handling
=============================================
Author: ChatGPT
Description:
    This file covers:
    - HTML Forms with PHP
    - $_GET and $_POST Superglobals
    - $_REQUEST
    - Form Validation (Client & Server Side)
    - Sanitization and Escaping
    - File Upload Handling
    - Extra best practices
*/

// ---------------------------
// 1. HTML Forms with PHP
// ---------------------------
// Forms send user data to the server.
// Method can be GET or POST.

/*
Example HTML form (Save as form.html):
--------------------------------------
<form action="process.php" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    File: <input type="file" name="upload"><br>
    <input type="submit" value="Submit">
</form>
--------------------------------------
*/

// ---------------------------
// 2. $_GET and $_POST
// ---------------------------
// $_GET retrieves data from the URL query string (method="get").
// $_POST retrieves data from the request body (method="post").

// Example: process_get.php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['name'])) {
        echo "Hello, " . htmlspecialchars($_GET['name']);
    }
}

// Example: process_post.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        echo "Hello, " . htmlspecialchars($_POST['name']);
    }
}

// ---------------------------
// 3. $_REQUEST
// ---------------------------
// $_REQUEST contains data from both GET, POST, and COOKIE.
// Not recommended for security-sensitive operations.

// Example:
if (isset($_REQUEST['name'])) {
    echo "Received: " . htmlspecialchars($_REQUEST['name']);
}

// ---------------------------
// 4. Form Validation
// ---------------------------
// Client-side: Done with HTML5 attributes or JavaScript (not secure alone).
// Server-side: Always validate on server!

function validateForm($data) {
    $errors = [];

    // Required field
    if (empty($data['name'])) {
        $errors[] = "Name is required.";
    }

    // Email validation
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateForm($_POST);
    if (empty($errors)) {
        echo "Form submitted successfully.";
    } else {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    }
}

// ---------------------------
// 5. Sanitization and Escaping
// ---------------------------
// Sanitization: Remove or alter unwanted characters.
// Escaping: Convert special characters to HTML entities to prevent XSS.

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Escaping output
echo htmlspecialchars($name);
echo htmlspecialchars($email);

// ---------------------------
// 6. File Upload Handling
// ---------------------------
// Requirements:
// - form tag must have: enctype="multipart/form-data"
// - PHP must have file_uploads enabled in php.ini

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upload'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['upload']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size (limit 2MB)
    if ($_FILES['upload']['size'] > 2 * 1024 * 1024) {
        echo "File too large.";
    } elseif (!in_array($fileType, ['jpg', 'png', 'gif', 'pdf'])) {
        echo "Invalid file type.";
    } else {
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "File upload error.";
        }
    }
}

// ---------------------------
// Extra Best Practices
// ---------------------------
// 1. Always validate & sanitize input before using it.
// 2. Never trust client-side validation alone.
// 3. Store uploaded files outside the public web root when possible.
// 4. Use prepared statements for database queries.
// 5. Limit file types and sizes to prevent abuse.

?>
