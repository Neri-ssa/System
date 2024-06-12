<?php
include "connection.php";
$id = $_GET['updateId'];
$updatesql = "SELECT * FROM user_form WHERE Id = $id";
$updatequery = mysqli_query($connection, $updatesql);
$updaterow = mysqli_fetch_assoc($updatequery);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];

  
    $updatesql= "UPDATE user_form SET name = '$name', email = '$email', password = '$pass', user_type = '$user_type' WHERE Id = $id";
    $addquery = mysqli_query($connection, $updatesql);
    if($addquery === TRUE){
        echo "Success Adding Client";
        header("location: read.php");
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
    <title>Update Page</title>

<style>
body{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.wrap{
    width: 500px;
    background: rgb(161, 161, 60);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
    margin-top: 8%;
}

.wrap .group{
    width: 100%;
    height: 30px;
    margin: 30px 0;
}

.group .text, .wrap form select{
    width: 83%;
    height: 30%;
    background: rgb(242, 248, 190);
    border: none;
    outline: none;
    border-radius: 10px;
    border: 2px solid rgb(189, 172, 20);
    font-size: 16px;
    padding: 20px 45px 20px 20px;
    align-items: center;
}

.group .text:hover{
    background: white;
}

.group .text::placeholder{
    color: rgb(105, 104, 104);
}

.edit{
    background-color: rgb(189, 172, 20);
    border-radius: 20%;
    color: white;
}

.delete{
    background-color: rgb(223, 68, 68);
    border-radius: 15%;
    color: white;
}

a input{
    transition: .1s;
}

a input:hover{
        -ms-transform: scale(1.5); /* IE 9 */
        -webkit-transform: scale(1.5); /* Safari 3-8 */
        transform: scale(1.1); 
}
</style>

</head>
<body>
    <div class="wrap">
<form action="" method="post">
    <h1>Edit Information</h1>
    <div class="fields">
        <div class="group"><input type="text" class="text" name="name" placeholder="Name" value="<?php echo $updaterow['name']?>"></div>
        <div class="group"><input type="text" class="text" name="email" placeholder="Email" value="<?php echo $updaterow['email']?>"></div>
        <div class="group"><input type="text" class="text" name="password" placeholder="Password" value="<?php echo $updaterow['password']?>"></div>
        <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
        </select><br><br>
    </div>
        <a><input type="submit" class="edit" name="update" value="Update"></a> <a href="read.php"><input type="button" class="delete" value="Cancel"></a>
</form>
    </div>
</body>
</html>