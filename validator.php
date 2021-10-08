<?php
class createUser {

    function __construct($username, $email, $password, $confirmPassword) {
        function validateUsername($username) {
            if(strlen($username) >= 6) {
                return $username;
            } else {
                echo '<br>Your username needs to be at least 6 characters.';
            }
        }

        function validatePassword($password, $confirmPassword) {
            $passwordChecks = 0;
            $passwordConstraints = '/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/';

            if(strlen($password) >= 6) {
                $passwordChecks++;
            } else {
                echo '<br>Your password needs to be at least 6 characters.';
            }
    
            if($password == $confirmPassword) {
                $passwordChecks++;
            } else {
                echo "<br>Your password and confirm password don't match!";
            }
    
            if(preg_match($passwordConstraints, $password)) {
                $passwordChecks++;
            } else {
                echo '<br>Your password must contain at least one uppercase letter, one lowercase letter, and a digit.';
            }
    
            if($passwordChecks == 3) {
                return $password;
            } else {
                echo '<br>Something went wrong with the password...';
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
};
?>