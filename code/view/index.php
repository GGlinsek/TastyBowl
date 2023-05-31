<?php
include 'view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cooking Recipes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card {
            transition: transform 0.3s ease;
            position: relative;
            height: 400px;
            z-index: 1;
            overflow: hidden;
        }

        .card-img-top{
            transition: 0.5s;
        }

        .card:hover {
            text-decoration: none;
            .card-img-top {
                transform: scale(1.05);
                transition: 0.5s;
            }
        }

        .card-body {
            height: 200px;
            transition: height 0.3s ease;
        }

        .card:hover .card-body {
            height: 220px;
        }

        .card-title,
        .card-text {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: black;
        }

        .card:hover .card-title,
        .card:hover .card-text {
            transform: scale(1.05);
            transition: 0.1s;
        }

        .card-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-decoration: none;
        }

        .card-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            text-decoration: none;
        }

        .recipe-link {
            text-decoration: none;
        }
        .recipe-link:hover{
            text-decoration: none;
            text-underline: none;
        }


    </style>
</head>
<body>
<div class="container mt-4">
    <h1>Welcome to Tasty Bowl</h1>
    <p>Discover a variety of delicious recipes to satisfy your taste buds.</p>
    <hr>

    <div class="row">
        <?php
        $recipes = RecipeController::getRecipes();

        foreach ($recipes as $recipe) {
            echo '<div class="col-lg-4 mb-4">';
            echo '<a href="recipe/view?recipe_id=' . $recipe['recipe_id'] . '" class="recipe-link">';
            echo '<div class="card">';
            echo '<img src="' . ASSETS_URL . 'recipeImages/' . $recipe['image'] . '" class="card-img-top" alt="' . $recipe['title'] . '" style="width: 348px; height: 200px;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $recipe['title'] . '</h5>';
            echo '<p class="card-text">' . $recipe['description'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
