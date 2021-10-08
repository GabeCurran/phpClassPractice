<?php
class createUser {

    function __construct($username, $email, $password, $confirmPassword) {
        $validatorArr = [$username, $email, $password, $confirmPassword];

        function validateCredentials($validatorArr) {
            $username = $validatorArr[0];
            $validEmail = $validatorArr[1];
            $password = $validatorArr[2];
            $confirmPassword = $validatorArr[3];

            $usernameValid = false;
            $passwordValid = false;
            $passwordChecks = 0;
            $passwordConstraints = '/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/';
    
            if(strlen($username) >= 6) {
                $usernameValid = true;
            } else {
                echo 'Your username needs to be at least 6 characters.';
            }
    
            if(strlen($password) >= 6) {
                $passwordChecks++;
            } else {
                echo 'Your password needs to be at least 6 characters.';
            }
    
            if($password == $confirmPassword) {
                $passwordChecks++;
            } else {
                echo "Your password and confirm password don't match!";
            }
    
            if(preg_match($passwordConstraints, $password)) {
                $passwordChecks++;
            } else {
                echo 'Your password must contain at least one uppercase letter, one lowercase letter, and a digit.';
            }
    
            if($passwordChecks = 3) {
                $passwordValid = true;
            }
    
            if($usernameValid == true && $passwordValid == true) {
                $validatedArr = [$username, $password];
                return $validatedArr;
            }
        }

        $this->username = validateCredentials($validatorArr)[0];
        $this->email = validateCredentials($validatorArr[1]);
        $this->password = validateCredentials($validatorArr[2]);
    }

    function get_username() {
        return $this->username;
    }
};

if (isset($_POST['submitForm'])) {
        if
                /* Check for empty values and prevent injection */
                (htmlspecialchars($_POST['password']) == htmlspecialchars($_POST['confirmPassword']) &&
                !empty(htmlspecialchars($_POST['username'])) && 
                !empty(htmlspecialchars($_POST['email'])) && 
                !empty(htmlspecialchars($_POST['password'])) && 
                !empty(htmlspecialchars($_POST['confirmPassword'])) && 

                /* Check for whitespace */
                !ctype_space(htmlspecialchars($_POST['username'])) && 
                !ctype_space(htmlspecialchars($_POST['email'])) && 
                !ctype_space(htmlspecialchars($_POST['password'])) && 
                !ctype_space(htmlspecialchars($_POST['confirmPassword'])))

                {
                    $user = new createUser(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['confirmPassword']));
                    echo 'your username is "'.$user->get_username().'".';
                };
};
?>