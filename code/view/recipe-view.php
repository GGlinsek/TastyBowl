<?php
include 'view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipe Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container {
            padding: 20px;
        }
        .recipe-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .recipe-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .recipe-username {
            font-size: 18px;
            color: #777;
            margin-bottom: 20px;
        }
        .recipe-description {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .recipe-instructions {
            font-size: 18px;
            white-space: pre-wrap;
            margin-bottom: 20px;
        }
        .recipe-creation-date {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }
        .ingredients-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .ingredients-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .ingredients-table th,
        .ingredients-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    $recipe_id = $_GET['recipe_id'];

    if ($recipe) {
        ?>
        <img src="<?= ASSETS_URL ?>recipeImages/<?= $recipe['image'] ?>" class="recipe-image" alt="Recipe Image">
        <div class="recipe-title"><?= $recipe['title'] ?></div>
        <div class="recipe-creation-date">Created on <?= $recipe['creation_date'] ?></div>
        <div class="recipe-username">By <?= $recipe['username'] ?></div>
        <div class="recipe-description"><?= $recipe['description'] ?></div>
        <div class="recipe-instructions"><?= $recipe['instructions'] ?></div>

        <div class="ingredients-title">Ingredients</div>
        <table class="ingredients-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ingredients as $ingredient) { ?>
                <tr>
                    <td><?= $ingredient['name'] ?></td>
                    <td><?= $ingredient['quantity'] . ' ' . $ingredient['quantity_type'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <?php
    } else {
        echo '<p>No recipe data found.</p>';
    }
    ?>
</div>
</body>
</html>

