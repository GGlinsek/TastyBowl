<?php

require_once("model/RecipeDB.php");
require_once("ViewHelper.php");
require_once ("model/IngredientDB.php");


class RecipeController {
    public static function getRecipes() {
        $recipeDB = new RecipeDB();

        return $recipeDB->getRecipes();
    }

    public static function viewRecipe() {
        $recipe_id = $_GET['recipe_id'];

        $recipe = RecipeDB::viewRecipe($recipe_id);
        $ingredients = IngredientDB::recipeIngredients($recipe_id);

        if ($recipe) {
            if (!$ingredients){
                $ingredients=[];
            }
            ViewHelper::render("View/recipe-view.php", ["recipe" => $recipe, "ingredients" => $ingredients]);

        } else {
            echo "Recipe not found.";
        }
    }


    public static function recipe() {
        ViewHelper::render("View/recipe-add.php");
    }

    public static function addRecipe() {
        (new RecipeDB) -> addRecipe($_POST["title"],$_POST["description"],$_POST["instructions"],$_FILES["image"],$_POST["ingredients"]);
    }
}