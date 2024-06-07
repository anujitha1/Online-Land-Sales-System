<?php require_once("header.php");?>
<?php require_once 'includes/connection.inc.php';?>
<?php

    $errors = array();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $phonenumber = $_POST['phNumber'];

        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $selectQuery = "SELECT * FROM newusers WHERE email = '{$email}';";

        $result_set = mysqli_query($connection, $selectQuery);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1){
                $errors[] = 'Email already exists';
            }
        }

        if(empty($errors)){
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['pwd']);

            $insertQuery = "INSERT INTO newusers (name, email, username, password, phonenumber) VALUES ('{$name}','{$email}','{$username}','{$password}','{$phonenumber}');";

            $result = mysqli_query($connection,$insertQuery);
            if($result){
                echo "<script>alert('Registration successful! You will be redirected shortly.');</script>";
                
            }
            header('Location: sellerlogin.php');
                exit();
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="new.css">
    <script>
        function validatePasswords(){
            var pwd1 = document.getElementById('pwd1').value;
            var pwd2 = document.getElementById('pwd2').value;

            if (pwd1 !== pwd2) {
                alert("Password not matched");
                return false;
            }
            return true;
    }

    </script>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Sora', sans-serif;
        }/*
    .form-div{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .form-div{
        margin-top: 30px;
    }
.heading{
    text-align: left;
}
label{
    text-align: left;
}*/
.form-div{
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
input{
    width: 350px;
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
    <center>
    
    <a href="sellerlogin.php">Back</a><br>

    <?php
        if (!empty($errors)) {
            echo '<div class="errmsg">';
            echo "Error in form<br>";
            foreach($errors as $error){
                echo $error. "<br>";
            }
            echo '</div>';
        }
    ?>
    <!--
    <form name="Form" action="sellersignup.php" method="POST">
        Name:
        <input type="text" name="name"><br><br>

        Email
        <input type="email" name="email"><br><br>

        Username
        <input type="text" name="username"><br><br>

        Password
        <input type="password" name="password"><br><br>

        <input type="submit" value="Add user" name="adduser">
    </form>-->

    <div class="form-div">
        <div class="form-elements">
        <h1 class="heading">Register as a seller</h1>
            <form action="sellersignup.php" method="POST" onsubmit="return validatePasswords()">
            <?php 
            if(isset($errors) && !empty($errors)){
                echo "<p>Invalid user or pass</p>";
            }
            ?>
                <label for="">Name</label><br>
                <input type="text" name="name" required><br>

                <label for="">Email</label><br>
                <input type="email" name="email" required><br>

                <label for="">Username</label><br>
                <input type="text" name="username" required><br>

                <label for="">Password</label><br>
                <input type="password" name="pwd" id="pwd1" required><br>

                <label for="">Re-enter Password</label><br>
                <input type="password" name="repwd" id="pwd2" required><br>

                <label for="">Phone Number</label><br>
                <input type="text" name="phNumber" required><br>

                <input type="submit" name="submit" id="submit" onclick="msg()">
            </form>
        </div>
    </div>
    </center>
</body>
</html>
<?php mysqli_close($connection);?>