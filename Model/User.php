<?php
class User {
    private ?int $id;
    private ?str $login;
    private ?str $password;
    private ?str $logState;

    public function __construct($login, $password, $id = 0, $logState = false) {
        $this->login = $login;
        $this->password = $password;
        $this->id = $id;
        $this->logState = $logState;
    }
    
    // SETTER
    public function setLogin($newLogin) {
        $this->login = $newLogin;
    }
    
    public function setPassword($newPassword) {
        $this->password = $newPassword;
    }

    public function setId($newId) {
        $this->id = $newId;
    }
    
    //GETTER
    public function getLogin() {
        return $this->login;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogState() {
        return $this->logState;
    }

    public function login() {
        $this->logState = true;
    }

    public function logout() {
        $this->logState = false;
    }

    public function getInfo() {
        $tab = [];
        $tab['id'] = $this->id;
        $tab['login'] = $this->login;
        $tab['password'] = $this->password;
        $tab['logState'] = $this->logState;
        return $tab;
    }
}
?>