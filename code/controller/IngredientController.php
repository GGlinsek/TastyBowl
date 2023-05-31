<?php

require_once("model/IngredientDB.php");
require_once("ViewHelper.php");

class IngredientController {

    public static function index(){
        ViewHelper::render("View/ingredient.php");
    }
    public static function addIngredient(){
        $name = $_POST["name"];

        (new IngredientDB)->addIngredient($name);

        ViewHelper::redirect(BASE_URL . "ingredient");
    }

    public static function getIngredients() {
        $ingredientDB = new IngredientDB();

        return $ingredientDB->getIngredients();
    }




}
