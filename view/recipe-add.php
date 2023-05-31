<?php
include 'view/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Recipe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        body {
            margin-bottom: 50px;
        }
    </style>

</head>
<body>
<div class="container">
    <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="alert alert-danger" role="alert">
            You must be logged in to add a new recipe.
        </div>
    <?php else: ?>
        <h1>Add New Recipe</h1>

        <form action="<?= BASE_URL . "recipe/add"?>" method="POST" enctype="multipart/form-data" id="recipe-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea class="form-control" id="instructions" name="instructions" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <h3>Ingredients:</h3>

            <div id="ingredient-list">
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <select class="form-control" id="ingredient-select" name="ingredients[]">
                        <?php
                        $ingredients = IngredientController::getIngredients();

                        foreach ($ingredients as $ingredient) {
                            echo "<option value='" . $ingredient['ingredient_id'] . '/' .  $ingredient['name'] ."'>" . $ingredient['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>

                <div class="col-md-2">
                    <select class="form-control" id="quantity-type" name="quantity-type">
                        <option value="ml">ml</option>
                        <option value="dcl">dcl</option>
                        <option value="l">l</option>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="piece">piece</option>
                        <option value="teaspoon">tsp</option>
                        <option value="tablespoon">tbsp</option>
                        <option value="cup">cup</option>
                        <option value="pint">pint</option>
                        <option value="quart">quart</option>
                        <option value="gallon">gallon</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="add-ingredient-btn">Add Ingredient</button>
                </div>
            </div>

            <div id="added-ingredients">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Recipe</button>
        </form>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ingredient-select').select2({
            placeholder: 'Search for an ingredient',
            allowClear: true,
            width: '100%'
        });

        var addedIngredients = [];

        $(document).on('click', '#add-ingredient-btn', function () {
            var ingredient = $('#ingredient-select').val().split('/')[1];
            var ingredient_id = $('#ingredient-select').val().split('/')[0];
            var quantity = $('#quantity').val();
            var quantityType = $('#quantity-type').val();

            var newIngredient = {
                ingredient_id: ingredient_id,
                quantity: quantity,
                quantity_type: quantityType
            };

            addedIngredients.push(newIngredient);

            var newIngredientElement = $('<p>' + ingredient + ' - ' + quantity + ' ' + quantityType + '</p>');

            var removeIcon = $('<span class="remove-icon">&#10060;</span>');

            newIngredientElement.append(removeIcon);

            $('#added-ingredients').append(newIngredientElement);

            $('#ingredient-select').val('').trigger('change');
            $('#quantity').val('');
            $('#quantity-type').val('');
        });

        $(document).on('click', '.remove-icon', function () {
            var removedIngredient = $(this).closest('p').text().trim();
            addedIngredients = addedIngredients.filter(function (ingredient) {
                var ingredientText = ingredient.ingredient_id + ' - ' + ingredient.quantity + ' ' + ingredient.quantity_type;
                return ingredientText !== removedIngredient;
            });
            $(this).closest('p').remove();
        });

        $('#recipe-form').submit(function (event) {
            $('<input>').attr({
                type: 'hidden',
                name: 'ingredients',
                value: JSON.stringify(addedIngredients)
            }).appendTo('#recipe-form');
        });
    });
</script>
</body>
</html>
