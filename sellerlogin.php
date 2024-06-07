<?php session_start(); ?>
<?php require_once './includes/connection.inc.php';?>
<?php
if(isset($_POST['submit'])){
    $errors = array();

    if (!isset($_POST['email']) || strlen(trim($_POST['email']))<1) {
        //$errors[] = "Username missing";
        echo 'Username missing or invalid';
    }
    if (!isset($_POST['pwd']) || strlen(trim($_POST['pwd']))<1) {
        echo 'Password missing or invalid';
    }


    if(empty($errors)){
        $email    = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['pwd']);

        $query = "SELECT * FROM newusers WHERE email = '{$email}' AND password = '{$password}' LIMIT 1;";

        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result)==1){
                $user = mysqli_fetch_assoc($result);
                $_SESSION['userId'] = $user['userId'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                header('Location: sellerdashboard.php');
            }
            else{
                //$errors[] = 'Database failed';
                echo "<p>Invalid user or pass</p>";
            } 
        }
        else{
            $errors[] = 'Database failed';
            //echo "<p>Invalid user or pass</p>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" type="text/css" href="login.css">-->
    <script src="new.js"></script>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Sora', sans-serif;
}
.logoimg{
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
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
    <!--
    <form action="sellerlogin.php" method="POST">
        <?php 
            //if(isset($errors) && !empty($errors)){
                //echo "<p>Invalid user or pass</p>";
            //}
        ?>
        Email
        <input type="email" name="email">


        Password
        <input type="password" name="pwd">


        <input type="submit" value="Login" name="submit">

    </form>-->
    <div class="logoimg">
        <div>
            <img src="horizonlands.png" alt="" width="200">
        </div>
    </div>
    <div class="form-div">
        <div class="form-elements">
        <h1>Seller Login</h1>
            <form action="sellerlogin.php" method="POST">
            <?php 
            if(isset($errors) && !empty($errors)){
                echo "<p>Invalid user or pass</p>";
            }
            ?>
                <label for="">Email</label><br>
                <input type="text" name="email"><br>

                <label for="">Password</label><br>
                <input type="password" name="pwd"><br>

                <input type="submit" name="submit" id="submit" onclick="msg()"><br>
                <a href="sellersignup.php">Signup Now</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($connection);?>