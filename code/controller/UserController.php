<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function index(){
        ViewHelper::render("View/index.php");
    }

    public static function register(){
        ViewHelper::render("View/register.php");
    }

    public static function registeruser()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $dob = $_POST["dob"];

        $error = (new UserDB)->registerUser($username, $email, $password, $dob);
        if ($error === '') {
            ViewHelper::redirect(BASE_URL . "index");
        } else {
            $_SESSION['error'] = $error;
            ViewHelper::redirect(BASE_URL . "register");
        }
    }


    public static function login(){
        ViewHelper::render("View/login.php");
    }

    public static function profile(){
        if ($_SESSION['user_id']) {
            $user = (new UserDB)->getUser($_SESSION['user_id']);
            ViewHelper::render("View/profile.php", ["user" => $user]);
        }
    }

    public static function logOut() {
        unset($_SESSION['user_id']);
        unset($_SESSION['admin']);
        ViewHelper::redirect(BASE_URL . "index");
    }

    public static function editUser(){
        (new UserDB)->editUser($_SESSION['user_id'], $_POST["username"], $_POST["email"], $_POST["birth_date"]);
        ViewHelper::redirect(BASE_URL . "profile");
    }

    public static function deleteUser(){
        (new UserDB)->deleteUser();
        unset($_SESSION['user_id']);
        unset($_SESSION['admin']);
        ViewHelper::redirect(BASE_URL . "index");
    }

    public static function loginUser() {
        $username = $_GET["username"];
        $password = $_GET["password"];

        $loggedIn = (new UserDB)->loginUser($username, $password);

        if ($loggedIn) {
            ViewHelper::redirect(BASE_URL . "index");
        } else {
            $_SESSION['login_error'] = true;
            ViewHelper::render("View/login.php");
        }
    }

}
