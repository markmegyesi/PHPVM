<?php

include (__DIR__ . './Login.php');

class Login_controller extends Login {

    protected $email;
    protected $password;

    public function __construct($email, $password) {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            echo '<script type="text/javascript">
       window.onload = function () { alert("Kérem töltse ki az összes mezőt"); } 
</script>';

            
        }

        $this->getUser($this->email, $this->password);
    }

    public function invalidUser() {
        if ($this->invalidEmail() == false || $this->invalidPassword() == false) {
            echo '<script type="text/javascript">
       window.onload = function () { alert("Nem megfelelő az e-mail cím vagy a jelszó"); } 
</script>';

            
        }
    }

    private function emptyInput() {
        $result;
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidPassword() {
        $result;

        if ($this->getUser($this->email, $this->password) == false) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}
