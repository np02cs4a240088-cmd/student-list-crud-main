<?php
if (isset($_POST['theme'])) {
    setcookie("theme", $_POST['theme'], time() + (86400 * 30));
    header("Location: dashboard.php");
}
?>

<form method="POST">
    Select Theme:
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select>
    <button>Save</button>
</form>
