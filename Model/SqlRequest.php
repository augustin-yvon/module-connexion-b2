<?php
require_once '../Model/Database.php';

class SqlRequest extends Database {

    public function validateLogin($login) : boolean {
        $checkLoginQuery = "SELECT id FROM user WHERE login = :login";
        $stmt = $this->pdo->prepare($checkLoginQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
    }

    public function register($login, $firstname, $lastname, $password) : boolean {
        $registerQuery = "INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)";
        $stmt = $this->pdo->prepare($registerQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
    }

    public function getId($login) {
        $selectIdQuery = "SELECT `id` FROM `user` WHERE `login` = :login";
        $stmt = $this->pdo->prepare($selectIdQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function checkInfo($login, $password) {
        $checkInfoQuery = "SELECT id FROM user WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($checkInfoQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true;
        }
    }

    public function updateLogin($newLogin, $newPassword, $userID) {
        $updateQuery = "UPDATE user SET login = :login, password = :password WHERE id = :id";

        $stmt = $this->pdo->prepare($updateQuery);

        $stmt->bindValue(':login', $newLogin, PDO::PARAM_STR);
        $stmt->bindValue(':password', $newPassword, PDO::PARAM_STR);
        $stmt->bindValue(':id', $userID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
    }

    public function getLoginById($id) {
        $getLoginByIdQuery = "SELECT login, password FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($getLoginByIdQuery);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }
    }
}