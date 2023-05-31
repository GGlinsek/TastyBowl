<?php
include 'view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>

    <?php
    if (isset($_SESSION['login_error']) && $_SESSION['login_error']) {
        echo '<div class="alert alert-danger" role="alert">Login failed. Please try again.</div>';
        $_SESSION['login_error'] = false;
    }
    ?>

    <form method="get" action="<?= BASE_URL . "login/loginuser"?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <a href="<?= BASE_URL . "register" ?>">No account yet? Register here.</a>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
