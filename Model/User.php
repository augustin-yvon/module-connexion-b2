<?php
class User {
    private ?int $id;
    private ?string $login;
    private ?string $password;
    private ?string $logState;

    public function __construct(string $login, string $password, int $id = 0, bool $logState = false) {
        $this->login = $login;
        $this->password = $password;
        $this->id = $id;
        $this->logState = $logState;
    }
    
    // SETTER
    public function setLogin(string $newLogin) {
        $this->login = $newLogin;
    }
    
    public function setPassword(string $newPassword) {
        $this->password = $newPassword;
    }

    public function setId(int $newId) {
        $this->id = $newId;
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