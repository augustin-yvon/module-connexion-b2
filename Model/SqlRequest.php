<?php
require_once '../Model/Database.php';

session_start();

class SqlRequest extends Database {

    public function validateLogin(string $login) : bool {
        $checkLoginQuery = "SELECT id FROM user WHERE login = :login";
        $stmt = $this->pdo->prepare($checkLoginQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function register(string $login, string $firstname, string $lastname, string $password) : bool {
        $registerQuery = "INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)";
        $stmt = $this->pdo->prepare($registerQuery);
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // $_SESSION['hashed-password'] = $hashed_password;
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        // $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function getId(string $login) : false|int {
        $selectIdQuery = "SELECT `id` FROM `user` WHERE `login` = :login";
        $stmt = $this->pdo->prepare($selectIdQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result;
    }

    public function checkInfo(string $login, string $password) : bool {
        $checkInfoQuery = "SELECT id FROM user WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($checkInfoQuery);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function updateLogin(string $newLogin, string $newPassword, int $userID) : void {
        $updateQuery = "UPDATE user SET login = :login, password = :password WHERE id = :id";

        $stmt = $this->pdo->prepare($updateQuery);

        $stmt->bindValue(':login', $newLogin, PDO::PARAM_STR);
        $stmt->bindValue(':password', $newPassword, PDO::PARAM_STR);
        $stmt->bindValue(':id', $userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getLoginById(int $id) : array|false {
        $getLoginByIdQuery = "SELECT login, password FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($getLoginByIdQuery);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    public function findAllStudent() : array|false {
        $findStudentQuery = "SELECT * FROM user WHERE login != 'admiN1337$'";
        $stmt = $this->pdo->prepare($findStudentQuery);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }
}