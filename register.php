<?php
// Include the database connection from the config folder
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    // Check if passwords match
    if ($pass !== $confirmPass) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Hash the password securely
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Insert query into the students table
    $sql = "INSERT INTO students (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful!'); window.location.href='student-login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
```eof

Make sure the file is saved as **`register.php`** right inside your root **`ai-resume-portal`** folder, then test your form registration through XAMPP!