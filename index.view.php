<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <form action='validator.php' method='post'>
        <div id='usernameDiv'>
            <label for='username'>Username</label>
            <input type='text' id='username' name='username' placeholder='Enter Username'>
        </div>

        <div id='emailDiv'>
            <label for='email'>Email</label>
            <input type='email' id='email' name='email' placeholder='Email Address'>
        </div>

        <div id='passwordDiv'>
            <label for='password'>Password</label>
            <input type='password' id='password' name='password' placeholder='Enter Password'>
            <input type="checkbox" onclick="showPassword()">
        </div>

        <div id='confirmPasswordDiv'>
            <label for='confirmPassword'>Confirm Password</label>
            <input type='password' id='confirmPassword' name='confirmPassword' placeholder='Confirm Password'>
            <input type="checkbox" onclick="showConfirmPassword()">
        </div>

        <input type="submit" id='submitForm' name='submitForm'></input>
    </form>
    <script>
        function showPassword() {
            let password = document.querySelector('#password');
            if(password.type == 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
        function showConfirmPassword() {
            let confirmPassword = document.querySelector('#confirmPassword');
            if(confirmPassword.type == 'password') {
                confirmPassword.type = 'text';
            } else {
                confirmPassword.type = 'password';
            }
        };
    </script>
</body>
</html>