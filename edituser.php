<?php session_start(); ?>
<?php require_once 'includes/connection.inc.php';?>
<?php

if(isset($_GET['user_id'])){
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM newusers WHERE userId = {$user_id} LIMIT 1;";
    $result_set = mysqli_query($connection, $query);

    if($result_set){
        if(mysqli_num_rows($result_set) == 1){
            $result = mysqli_fetch_assoc($result_set);
            $name = $result['name'];
            $email = $result['email'];
            $username = $result['username'];
            $pass = $result['password'];
            $phone = $result['phonenumber'];
        }
        else{

        }
    }
}

if(isset($_POST['update'])){
    $uid = $_POST['userid'];
    $nameu = $_POST['name'];
    $emailu = $_POST['email'];
    $usernameu = $_POST['username'];
    $passwordu = $_POST['password'];
    $phonenumber = $_POST['phonenum'];

    $updateQuery = "UPDATE newusers SET name = '$nameu', email = '$emailu', username = '$usernameu', password = '$passwordu', phonenumber = '$phonenumber' WHERE userId = '$uid';";
    mysqli_query($connection, $updateQuery);
    header('Location: adminpanel.php');
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

center{
    margin-top: 30px;
}
        .forms{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
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
    <center>
        <h1>Edit Seller information</h1>
    </center>
    <form action="edituser.php" method="POST" class="forms">
        <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
        <label for="">Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">

        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">

        <label for="">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">

        <label for="">Password</label>
        <input type="text" name="password" value="<?php echo $pass; ?>">

        <label for="">Phone Number</label>
        <input type="text" name="phonenum" value="<?php echo $phone; ?>">

        <input type="submit" name="update" value="Save">
    </form>
</body>
</html>