<?php
session_start();
class createUser {

    function __construct($username, $email, $password, $confirmPassword) {
        function validateUsername($username) {
            if(strlen($username) >= 6) {
                return $username;
            } else {
                header('Location: index.php?error=2');
                exit;
            }
        }

        function validatePassword($password, $confirmPassword) {
            $passwordChecks = 0;
            $passwordConstraints = '/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/';

            if(strlen($password) >= 6) {
                $passwordChecks++;
            } else {
                header('Location: index.php?error=3');
                exit;
            }
    
            if($password == $confirmPassword) {
                $passwordChecks++;
            } else {
                header('Location: index.php?error=4');
                exit;
            }
    
            if(preg_match($passwordConstraints, $password)) {
                $passwordChecks++;
            } else {
                header('Location: index.php?error=5');
                exit;
            }
    
            if($passwordChecks == 3) {
                return $password;
            } else {
                header('Location: index.php?error=6');
                exit;
            }

        }

        $this->username = validateUsername($username);
        $this->email = $email;
        $this->password = validatePassword($password, $confirmPassword);
    }

    function get_username() {
        return $this->username;
    }
};

$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['confirmPassword'] = $_POST['confirmPassword'];

if (isset($_POST['username']) &&
    !empty($_POST['username']) && 
    isset($_POST['email']) &&
    !empty($_POST['email']) && 
    isset($_POST['password']) &&
    !empty($_POST['password']) && 
    isset($_POST['confirmPassword']) &&
    !empty($_POST['confirmPassword'])) {
        $user = new createUser(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['confirmPassword']));
        echo '<br>your username is "'.$user->get_username().'".';
} else {
    header('Location: index.php?error=1');
    exit;
};
?>