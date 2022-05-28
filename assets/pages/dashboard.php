<?php
    include 'functions.php';
    if(login_check()==false){
        redirect('../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/dashboard.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
    <title>Todo Dashboard</title>
</head>
<body>
    <div class="body">
        <div class="main">
            <div>
                <p class="title">
                    <!-- <img src="../../uploads/<?=$_SESSION['profilepic'];?>" class="profilepicture">     -->
                    Welcome Back <strong class="username"> <?=$_SESSION['name']; ?> </strong>
                    <span class="logout">
                        <a href="logout.php">
                            <!-- <img src="../images/fun.gif" alt="logout" class="logoutimage"><br> -->
                            <span class="logouttext" title="Return to Login Page!">LogOut</span></a>
                    </span>
                </p>
            </div>
            <hr>
            <h2 class="addtodotitle">Add new Todo</h2>
            <div class="addtodo">
                <form action="todo.php" method="post">
                    <p>Title: </p>
                    <p>
                        <input type="text" name="title" placeholder="Todo Title" title="Enter todo title!" class="addtodotitlename">
                    </p>
                    <p>Desc: </p>
                    <p>
                        <textarea name="description" id=""rows="1" placeholder="Todo Description..." title="Enter todo description!"></textarea>
                    </p>
                    <p class="addbutton">
                        <input type="submit" value="Add" title="Add todo in the list!" class="addtodobtn">
                        <input type="hidden" name="todo_action" value="add" >
                    </p>
                </form>
            </div>
            <div class="todo">
                <p>
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo ($_SESSION['msg']);
                            unset ($_SESSION['msg']);
                        }
                        $sql = "select * from todos where user_id = ".$_SESSION['login_id']." order by id desc limit 5";
                        $sqlExec = mysqli_query($dbconnect,$sql);
                        $no_of_todos = mysqli_num_rows($sqlExec);

                        while($data = mysqli_fetch_assoc($sqlExec)):
                    ?>
                </p> 
                    <div class=eachtodo>
                        <h3 class="todotitle"><?= $data['title']?></h3>
                        <div class="eachtododesc">
                            <p class="tododesc"><?= $data['description']?></p>
                            <div class="todobtn">
                                <p><a href="edit.php?editid=<?= $data['id']?>&edittitle=<?= $data['title'] ?>" title="Edit!"><i class=' fa fa-edit green-color'></i></a></p>
                                
                                <p><a href="todo.php?did=<?= $data['id'] ?>" onclick="return confirm('Are you sure?')"  title="Delete!"><i class='fa fa-remove red-color'></i></a></p>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</body>
</html>
