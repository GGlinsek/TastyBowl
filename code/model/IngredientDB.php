<?php


use model\DBInit;

require_once "DBInit.php";

class IngredientDB {
    function addIngredient($ingredientName)
    {
        $db = DBInit::getInstance();

        // Prepare and execute the SQL query
        $statement = $db->prepare("INSERT INTO ingredients (name) VALUES (?)");
        $statement->bindParam(1, $ingredientName);

        $statement->execute();
    }

    function getIngredients() {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM ingredients");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function recipeIngredients($recipe_id){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT ri.*, i.name AS name
                        FROM recipeingredients ri 
                        JOIN ingredients i ON ri.ingredient_id = i.ingredient_id
                        WHERE ri.recipe_id = :recipe_id;
");

        $statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}