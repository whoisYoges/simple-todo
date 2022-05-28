<?php
    include 'functions.php';
    if(login_check()==false){
        redirect('../../index.php');
    }

    if(isset($_POST['todo_action']) and $_POST['todo_action'] == 'add'){
        $title = escape($_POST['title']);
        $description = escape($_POST['description']);
        $user_id = (int) $_SESSION['login_id'];

        $sql = "insert into todos (title, description, user_id) values ('$title', '$description', '$user_id')";
        if(mysqli_query($dbconnect,$sql)){
            $_SESSION['msg']="Record Saved";
            redirect('dashboard.php');
        }

    }
    else if(isset($_GET['did'])){
        $id = (int)$_GET['did'];

        $sql = "delete from todos where id = $id";
        if(mysqli_query($dbconnect, $sql)){
            $_SESSION['msg'] = "Record deleted";
            // echo ($_SESSION['msg']);
            redirect('dashboard.php');
        }
    }
    else if(isset($_POST['todo_action']) and $_POST['todo_action'] == 'edit'){
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
        }
        $title = escape($_POST['newtitle']);
        $description = escape($_POST['newdescription']);
        $sql = "update todos SET title = '$title', description = '$description' where id = $id";
        if(mysqli_query($dbconnect,$sql)){
            $_SESSION['msg']="Record Updated!";
            redirect('dashboard.php');
        }
    }
    
    else{
        redirect('dashboard.php');
    }
