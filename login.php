<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit();
}

include 'php/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT id, full_name, email, password, role, status FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if ($user["status"] !== "active") {
                $message = "Your account is disabled.";
            } elseif (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["full_name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $user["role"];

                header("Location: profile.php");
                exit();
            } else {
                $message = "Invalid email or password.";
            }
        } else {
            $message = "Invalid email or password.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Login</h1>

<?php if ($message != "") echo "<p>$message</p>"; ?>

<form method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>

    <br><br>
    <p>Don't have an account? <a href="register.php">Register here</a></p>

</form>

</body>
</html>
