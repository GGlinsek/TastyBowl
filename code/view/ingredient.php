<?php
include 'view/navbar.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1) {
    echo '<div class="container">';
    echo '<h2>Access Denied</h2>';
    echo '<p>You do not have permission to access this page.</p>';
    echo '</div>';
    echo '<div></div>';
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add New Ingredient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Add New Ingredient</h2>
    <form method="POST" action="<?= BASE_URL . "ingredient/add"?>">
        <div class="form-group">
            <label for="name">Ingredient Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Ingredient</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
