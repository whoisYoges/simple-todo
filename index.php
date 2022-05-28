<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Login Page</title>
</head>
<body>
    <div class="body">
        <div class="main">
            <div>
                <p class="title"> TODO Login </p>
                <p>Save your todos in a click!</p>
            </div>
            <hr>
            <div class="formarea">
                <div class="main-container">
                    <div class="text">
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                    }
                    ?>
                        <form action="assets/pages/process.php" method="post" class="wvmd"s>
                            <p class="email">Email: <input type="text" name="email" id="" placeholder="Enter your email here!"></p>
                            <p>Password: <input type="password" name="password" id="" placeholder="Enter your password here!"></p>
                            <input type="hidden" name="action" value="login">
                            <input type="submit" value="Login">
                        </form>
                    </div>
                    <div class="main-image">
                        <img src="assets/images/funny-animated-pc.gif" alt="lain">
                    </div>
                </div>
                <p>Don't have an account?
                    <a href="assets/pages/register.php" title="Create new account!">Register Here!</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>