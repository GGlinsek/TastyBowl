<?php
include 'view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Profile</h2>
    <form method="POST" action="<?= BASE_URL . "profile/edit"?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date:</label>
            <input type="date" class="form-control" id="birth-date" name="birth_date" value="<?= $user['birth_date'] ?>">
        </div>

        <div class="form-group">
            <label for="registration-date">Registration Date:</label>
            <input type="text" class="form-control" id="registration-date" name="registration-date" value="<?= $user['registration_date'] ?>" readonly>
        </div>

        <button type="submit"  class="btn btn-primary" id="update-profile-btn">Update Profile</button>
        <button type="button" class="btn btn-danger" id="delete-profile-btn">Delete Profile</button>
    </form>


</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>

    document.getElementById('update-profile-btn').addEventListener('click', function () {
        var confirmation = confirm('Are you sure you want to update your profile?');
        if (confirmation) {

        }
    });

    document.getElementById('delete-profile-btn').addEventListener('click', function () {
        var confirmation = confirm('Are you sure you want to delete your profile?');
        if (confirmation) {
            window.location.href += "/delete" ;
        }
    });
</script>
</body>
</html>
