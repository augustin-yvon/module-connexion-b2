<?php
class User {
    private int $id;
    private string $login;
    private string $password;
    private bool $logState;

    public function __construct(string $login, string $password, int $id = 0, bool $logState = false) {
        $this->login = $login;
        $this->password = $password;
        $this->id = $id;
        $this->logState = $logState;
    }
    
    // SETTER
    public function setLogin(string $newLogin) : User {
        $this->login = $newLogin;
        return $this;
    }
    
    public function setPassword(string $newPassword) : User {
        $this->password = $newPassword;
        return $this;
    }

    public function setId(int $newId) : User {
        $this->id = $newId;
        return $this;
    }
    
    //GETTER
    public function getLogin() : string {
        return $this->login;
    }
    
    public function getPassword() : string {
        return $this->password;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getLogState() : bool {
        return $this->logState;
    }

    public function logIn() : void {
        $this->logState = true;
    }

    public function logOut() : void {
        $this->logState = false;
    }

    public function getInfo() : array {
        $tab = [];
        $tab['id'] = $this->id;
        $tab['login'] = $this->login;
        $tab['password'] = $this->password;
        $tab['logState'] = $this->logState;
        return $tab;
    }
}
?>