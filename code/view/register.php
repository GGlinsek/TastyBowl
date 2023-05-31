<?php
include 'view/navbar.php';

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$usernameValue = isset($_SESSION['usernameValue']) ? $_SESSION['usernameValue'] : '';
$emailValue = isset($_SESSION['emailValue']) ? $_SESSION['emailValue'] : '';
unset($_SESSION['error']);
unset($_SESSION['usernameValue']);
unset($_SESSION['emailValue']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .error {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="<?= BASE_URL . "register/registeruser"?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control <?= $error === 'Username is taken' ? 'error' : '' ?>" name="username" value="<?= $usernameValue ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control <?= $error === 'Email is taken' ? 'error' : '' ?>" name="email" value="<?= $emailValue ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth (optional):</label>
            <input type="date" class="form-control" name="dob">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
