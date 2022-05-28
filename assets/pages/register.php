<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register Page</title>
</head>
<body>
    <div class="body">
        <div class="main">
            <div>
                <p class="title"> Create New Account </p>
            </div>
            <hr>
            <div class="formarea">
                <div class="text">
                    <form action="process.php" method="post" enctype="multipart/form-data" class="wvmd">
                        <p class="name">
                            Name: <input type="text" name="name" id="" placeholder="Enter your name here!">
                        </p>
                        <p class="email">
                            Email: <input type="text" name="email" id="" placeholder="Enter your email here!">
                        </p>
                        <p class="password">
                            Password: <input type="password" name="password" id="" placeholder="Enter your password here!">
                        </p>
                        <p>
                            Profile Picture: <input type="file" name="profilepic" id="">
                        </p>
                        <input type="hidden" name="action" value="register">
                        <input type="submit" value="Register" title="Create your account!">
                    </form>
                </div>
                <p>Already have an account? 
                    <a href="../../index.php" title="Login to your Account!">Login Now!</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>