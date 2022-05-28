<?php

    include 'config.php';

    if(isset($_POST['action'])){
        if($_POST['action'] == 'login'){
            //echo "Login Garna AAKO HAi!!";
            $email = mysqli_escape_string($dbconnect,$_POST['email']);
            $password = mysqli_escape_string($dbconnect,$_POST['password']);

            $sql = "select * from users where email = '$email'";
            $sqlExec = mysqli_query($dbconnect, $sql);
            $data = mysqli_fetch_assoc($sqlExec);
            if($data == null){
                //echo "User not found.";
                $_SESSION['msg'] = "User not found!";
                header('location:../../index.php');
                exit;
            }
            else{
                $userPassword = $data['password'];
                if(password_verify($password, $userPassword)){
                    //echo "Login";
                    $_SESSION['login_id'] = $data['id'];
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['profilepic'] = $data['image'];

                    header('location:dashboard.php');
                }
                else{
                    //echo "Login Failed";
                    $_SESSION['msg'] = "Username or password invalid!";
                    header('location:../../index.php');
                    exit;
                }
            }
        }

        elseif($_POST['action'] == 'register'){
            $name = mysqli_escape_string($dbconnect,$_POST['name']);
            $email = mysqli_escape_string($dbconnect,$_POST['email']);
            $password = mysqli_escape_string($dbconnect,$_POST['password']);
            $password = mysqli_escape_string($dbconnect,password_hash($password, PASSWORD_DEFAULT));

            $image = $_FILES['profilepic']['name'];
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $new_name = rand()."-".time().".".$extension;
            move_uploaded_file($_FILES['profilepic']['tmp_name'],"../../uploads/$new_name");

            $sql = "insert into users (email,password,name,image) values('$email', '$password', '$name', '$new_name')";
            mysqli_query($dbconnect,$sql);
            $_SESSION['msg'] = "User registered successfully! Login Now!";
            header('location:../../index.php?register');
        }
    }
    else{
        header('location:../../index.php');
    }
