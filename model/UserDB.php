<?php


use model\DBInit;

require_once "DBInit.php";

class UserDB {

    function isUsernameTaken($username)
    {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT COUNT(*) as count FROM users WHERE username = ?");
        $statement->bindParam(1, $username);
        $statement->execute();
        $result = $statement->fetch();

        return $result['count'] > 0;
    }

    function isEmailTaken($email)
    {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
        $statement->bindParam(1, $email);
        $statement->execute();
        $result = $statement->fetch();

        return $result['count'] > 0;
    }

    function registerUser($username, $email, $password, $dob)
    {
        $db = DBInit::getInstance();

        if ($this->isUsernameTaken($username)) {
            return 'Username is taken';
        }

        if ($this->isEmailTaken($email)) {
            return 'Email is taken';
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $currentDateTime = date("Y-m-d ");

        $statement = $db->prepare("INSERT INTO users (username, email, password, registration_date, birth_date) VALUES (?, ?, ?, ?, ?)");
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $hashedPassword);
        $statement->bindParam(4, $currentDateTime);
        $statement->bindParam(5, $dob);
        $statement->execute();

        $statement = $db->prepare("SELECT user_id, admin FROM users WHERE username = ?");
        $statement->bindParam(1, $username);
        $statement->execute();
        $result = $statement->fetch();

        $_SESSION['user_id'] = $result["user_id"];
        $_SESSION['admin'] = $result['admin'];

        return '';
    }

    function loginUser($username, $password) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT password, user_id, admin FROM users WHERE username = ?");
        $statement->bindParam(1, $username);
        $statement->execute();
        $result = $statement->fetch();

        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result["user_id"];
            $_SESSION['admin'] = $result['admin'];
            return true;
        } else {
            return false;
        }
    }

    function getUser($user_id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT* FROM users WHERE user_id = ?");
        $statement->bindParam(1, $user_id);
        $statement->execute();
        $result = $statement->fetch();

        return $result;
    }

    function deleteUser(){
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM users WHERE user_id = ?");
        $statement->bindParam(1, $_SESSION['user_id']);
        $statement->execute();
    }

    function editUser($user_id, $username, $email, $dob) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE users SET username = ?, email = ?, birth_date = ? WHERE user_id = ?");
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $dob);
        $statement->bindParam(4, $user_id);
        $statement->execute();
    }

}