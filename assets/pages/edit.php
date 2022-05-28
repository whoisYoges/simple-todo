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
    <link rel=stylesheet href="../css/edit.css">
    <title>Edit Todo</title>
</head>
<body>
<div class="body">
    <div class="main">
        <div>
            <p class="title">Todo To Edit!</p>
        </div>
        <hr>
        <?php
            if(isset($_GET['editid'])){
                $id = (int)$_GET['editid'];
            }

            if(isset($_GET['edittitle'])){
                $sql = "select * from todos where title = \"".$_GET['edittitle']."\" and id = $id";
                $sqlExec = mysqli_query($dbconnect,$sql);
                $data = mysqli_fetch_assoc($sqlExec);
            }
  
        ?>
        <div class=eachtodo>
            <h3 class="todotitle"><?= $data['title']?></h3>
            <div class="eachtododesc">
                <p class="tododesc"><?= $data['description']?></p>
            </div>
        </div>

        <div class="addtodo">
            <form action="todo.php?id=<?= $id ?>" method="post">
                <p>New Title: </p>
                <p>
                    <input type="text" name="newtitle" placeholder="New Title" title="Add New title!" class="addtodotitlename">
                </p>
                <p>New Desc: </p>
                <p>
                    <textarea name="newdescription" id=""rows="1" placeholder="New Todo Description..." title="Enter New todo description!"></textarea>
                </p>
                <p class="addbutton">
                    <input type="submit" value="Save" title="Update Todo!" class="addtodobtn">
                    <input type="hidden" name="todo_action" value="edit" >
                </p>
            </form>
        </div>
        <p><a href="dashboard.php">Back</a></p>
    </div>
</div>

</body>
</html>