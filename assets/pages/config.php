<?php

    session_start();

    // database server credientials
    $hostname = 'localhost';
    $hostuser = 'root';
    $hostpass = '';
    $dbname = 'todo_project';
    // $dbname = 'useless';

    //connection between php and mysql
    $dbconnect = mysqli_connect($hostname,$hostuser,$hostpass,$dbname);

    if($dbconnect){
        $_SESSION['msg'] = "";
    }
    else{
        $_SESSION['msg'] = "Failed to connect to server!";
    }
    