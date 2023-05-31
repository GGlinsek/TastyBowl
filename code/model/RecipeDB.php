<?php


use model\DBInit;

require_once "DBInit.php";

class RecipeDB {
    function getRecipes(){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM recipes ORDER BY title asc");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function viewRecipe($recipe_id)
    {
        $db = DBInit::getInstance();

        $sql = "SELECT recipes.*, users.username
        FROM recipes
        INNER JOIN users ON recipes.user_id = users.user_id
        WHERE recipes.recipe_id = :recipe_id";

        $statement = $db->prepare($sql);

        $statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);

        $statement->execute();

        $recipe = $statement->fetch(PDO::FETCH_ASSOC);

        return $recipe;
    }


    function addRecipe($title, $description, $instructions, $image, $ingredients)
    {
        $db = DBInit::getInstance();

        $currentDateTime = date("Y-m-d ");

        $statement = $db->prepare("INSERT INTO recipes (user_id, title, description, instructions, creation_date) VALUES (?, ?, ?, ?, ?)");
        $statement->bindParam(1, $_SESSION['user_id']);
        $statement->bindParam(2, $title);
        $statement->bindParam(3, $description);
        $statement->bindParam(4, $instructions);
        $statement->bindParam(5, $currentDateTime);
        $statement->execute();

        $recipe_id = $db->lastInsertId();
        $ingredients = json_decode($ingredients, true);

        $imageFile = $image;

        $imageName = $imageFile['name'];
        $imageTmpPath = $imageFile['tmp_name'];
        $imageType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $imagePath = 'assets/recipeImages/recept' . $recipe_id . '.' . $imageType;
        move_uploaded_file($imageTmpPath, $imagePath);

        $statement = $db->prepare("UPDATE recipes SET image = CONCAT('recept', :recipe_id, '.', :image_type) WHERE recipe_id = :recipe_id");
        $statement->bindValue(':recipe_id', $recipe_id);
        $statement->bindValue(':image_type', $imageType);
        $statement->execute();

        foreach ($ingredients as $ingredient) {
            $ingredient_id = $ingredient['ingredient_id'];
            $quantity = $ingredient['quantity'];
            $quantity_type = $ingredient['quantity_type'];

            $statement = $db->prepare("INSERT INTO recipeingredients (recipe_id, ingredient_id, quantity, quantity_type) VALUES (?, ?, ?, ?)");
            $statement->bindParam(1, $recipe_id);
            $statement->bindParam(2, $ingredient_id);
            $statement->bindParam(3, $quantity);
            $statement->bindParam(4, $quantity_type);
            $statement->execute();
        }
    }
}