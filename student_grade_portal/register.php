<?php
include "db.php";

if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO students (student_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_id, $name, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
    }
}
?>

<form method="POST">
    Student ID: <input type="text" name="student_id" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    <button name="register">Register</button>
</form>
