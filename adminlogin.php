<?php require_once("includes/connection.inc.php");?>
<?php session_start(); ?>
<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $passWord = $_POST['password'];

    if(empty($username) || empty($passWord)){
        echo "Username or Password missing";
    }

    $sql = "SELECT * FROM admins WHERE username = '{$username}' AND password = '{$passWord}';";
    $query = mysqli_query($connection, $sql);

    if($query){
        if(mysqli_num_rows($query)==1){
            $record = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $record['username'];
            header('Location: adminpanel.php');
        }
        else{
            echo "Username or Password Incorrect !";
        }
    }
    else{
        //echo "Username or Password Incorrect !";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Sora', sans-serif;
}
        .form-div{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
input{
    width: 250px;
    padding: 12px;
    border: 1px solid rgb(104, 104, 104);
    margin-top: 10px;
    margin-bottom: 16px;
}
input[type=submit] {
    background-color: #04AA6D;
    color: white;
}
    </style>
</head>
<body>

    <div class="form-div">
        <div class="form-elements">
        <h1>Admin Login</h1>
            <form action="adminlogin.php" method="POST">
                <label for="">Email</label><br>
                <input type="text" name="username"><br>

                <label for="">Password</label><br>
                <input type="password" name="password"><br>

                <input type="submit" name="login" id="submit"><br>
            </form>
        </div>
    </div>
</body>
</html>