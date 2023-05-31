<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/IngredientController.php");
require_once("controller/RecipeController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "index" => function () {
        UserController::index();
    },

    "register" => function () {
        UserController::register();
    },

    "register/registeruser" => function () {
        UserController::registeruser();
    },

    "login" => function () {
        UserController::login();
    },

    "login/loginuser" => function () {
        UserController::loginUser();
    },

    "ingredient" => function () {
        IngredientController::index();
    },

    "ingredient/add" => function () {
        IngredientController::addIngredient();
    },

    "recipe" => function () {
        RecipeController::recipe();
    },



    "recipe/add" => function () {
        RecipeController::addRecipe();
    },

    "recipe/view" => function () {
        RecipeController::viewRecipe();
    },

    "" => function () {
        ViewHelper::redirect(BASE_URL . "index");
    },


    "profile" => function () {
        UserController::profile();
    },
    "profile/edit" => function () {
        UserController::editUser();
    },

    "profile/logout" => function () {
    UserController::logOut();
    },


    "profile/delete" => function () {
        UserController::deleteUser();
    }
];

try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
}
