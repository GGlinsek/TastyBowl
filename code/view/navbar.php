<!DOCTYPE html>
<html>
<head>
    <title>Tasty Bowl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            margin-right: auto;
        }
        .navbar-nav.ml-auto {
            margin-left: auto;
        }
        .navbar-nav.m-auto {
            margin: auto;
        }
        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .add-recipe-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
        }
        .add-ingredient-button {
            margin-right: 10px;
        }
        .dropdown-menu {
            min-width: 100px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="<?= BASE_URL ?>">Tasty Bowl</a>

    <?php if ($_SERVER['PHP_SELF'] !== BASE_URL . "login" && $_SERVER['PHP_SELF'] !== BASE_URL . "register" && $_SERVER['PHP_SELF'] !== BASE_URL . "profile" ): ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </ul>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <ul class="navbar-nav ml-auto">
            <?php

            if ($_SESSION['admin'] == 1 && $_SERVER['REQUEST_URI'] !== BASE_URL . "profile"): ?>
                <li class="nav-item">

                    <a class="nav-link add-ingredient-button" href="<?= BASE_URL ?>ingredient">Add Ingredients</a>
                </li>
            <?php endif; ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo ASSETS_URL . "blank_profile_picture.webp"; ?>" alt="Profile Picture" style="width: 30px; height: 30px;">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?= BASE_URL ?>profile">Edit</a>
                    <a class="dropdown-item" href="<?= BASE_URL ?>profile/logout">Logout</a>
                </div>
            </li>
        </ul>
    <?php else: ?>
        <?php if ($_SERVER['REQUEST_URI'] !== BASE_URL . "login" && $_SERVER['REQUEST_URI'] !== BASE_URL . "register" && $_SERVER['REQUEST_URI'] !== BASE_URL . "profile"): ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>login">Login</a>
                </li>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</nav>

<?php if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== BASE_URL . "profile" && $_SERVER['REQUEST_URI'] !== BASE_URL . "recipe"): ?>
    <a href="<?= BASE_URL ?>recipe" class="btn btn-primary add-recipe-button">Add Recipe</a>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
