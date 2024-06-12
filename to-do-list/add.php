<?php

include "connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];

  
    $addsql= "INSERT INTO user_form(Id, Name, Email, Password, User_type) VALUES ('$id', '$name', '$email', '$pass', '$user_type')";
    $addquery = mysqli_query($connection, $addsql);

    if($addquery === TRUE){
        echo "Success Adding Client";
        header("location: admin_page.php");
    }else{
        echo "Not Success Adding Client". mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>

<style>
.body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
}

.wrapper{
    width: 420px;
    background: rgb(129, 129, 55);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
    margin-top: 5%;
}

.wrapper h1{
    font-size: 36px;
    text-align: center;
}

.wrapper .form-group{
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.form-group .textarea, .wrapper form select{
    width: 83%;
    height: 40%;
    background: rgb(242, 248, 190);
    border: none;
    outline: none;
    border: 2px solid rgb(189, 172, 20);
    border-radius: 10px;
    font-size: 16px;
    padding: 20px 45px 20px 20px;
    align-items: center;
}

.form-group .textarea:hover{
    background: white;
}

.form-group textarea::placeholder{
    color: white;
}

.add{
    background-color: rgb(189, 172, 20);
    border-radius: 20%;
    color: white;
}

.back{
    background-color: rgb(223, 68, 68);
    border-radius: 15%;
    color: white;
}

.btn{
    background: rgb(189, 172, 20);
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgb(189, 177, 177);
    cursor: pointer;
    font-size: 16px;
    justify-items: center;
    display: flex;
}
</style>

</head>
<body class="body">
    <div class="wrapper">
    <form action="" method="post">
        <h1>Add Client</h1>
        <div class="form-fields">
        <div class="form-group"><input type="text" class="textarea" name="name" placeholder="Name"></div>
        <div class="form-group"><input type="text" class="textarea" name="email" placeholder="Email"></div>
        <div class="form-group"><input type="text" class="textarea" name="password" placeholder="Password"></div>
        <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select><br><br>
        </div>
        <a><input type="submit" class="add" name="submit" value="Add"></a> <a href="read.php"><input type="button" class="back" value="Cancel"></a>
    </form></div>
    
</body>
</html>