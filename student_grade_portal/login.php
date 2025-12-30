<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM students WHERE student_id=?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($storedhash);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $storedhash)) {
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="POST">
    Student ID: <input type="text" name="student_id" required><br>
    Password: <input type="password" name="password" required><br>
    <button name="login">Login</button>
</form>
