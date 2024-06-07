<?php require_once("header.php");?>
<?php require_once("includes/connection.inc.php");?>
<?php
if(isset($_POST['sendbtn'])){
    $usersname = $_POST['name'];
    $phonenumber = $_POST['phonenum'];
    $usersmessage = $_POST['message'];

    $sql = "INSERT INTO inquiry (users_name, phone_number, message) VALUES ('$usersname', '$phonenumber', '$usersmessage');";

    $query = mysqli_query($connection, $sql);

    if($query){
        echo "<p class='successmsg'>Message sent successfully</p>";
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
        .upper-image{
    width: 100%;
    height: 300px;
    background-image: url("house1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    padding: 100px 140px;
    font-size: 25px;
    }
    .inquireus{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        flex-wrap: wrap;
        margin: 50px 30px;
        font-size: 20px;
    }
    .inquireusitem{
        margin: 20px;
        text-align: center;
    }
    .inquireform{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
        margin-bottom: 80px;
    }
    .inquireform input{
        padding: 10px 15px;
        margin: 0px 20px;
    }
    #submitbtn{
        padding: 10px 30px;
        background-color: #2a9158;
        color: white;
        border-style: none;
        font-size: 20px;
        cursor: pointer;
    }
    .successmsg{
        text-align: center;
        padding: 30px;
        width: 400px;
        height: 80px;
        background: gray;
        color: white;
        font-size: 20px;
    }
    </style>
</head>
<body>
<div class="upper-image">
        <h1>Contact Us</h1>
    </div>

    <div class="aboutus-container">
        <div class="">

        </div>
        <div>

        </div>
    </div>

    <div class="inquireus">
        <div class="inquireusitem">
            <h1>Inquire us</h1>
        </div>
        <div class="inquireusitem">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis sit totam at pariatur tempore quod dolore, quaerat odit expedita quas voluptatum blanditiis asperiores beatae eum necessitatibus. Veritatis, vero! Debitis, libero.</p>

        </div>
    </div>

    <form action="contactus.php" class="inquireform" method="POST">
        Name
        <input type="text" name="name" required>

        Phone Number
        <input type="text" name="phonenum" required>

        Message
        <input type="text" name="message" required>

        <input type="submit" name="sendbtn" value="Send" id="submitbtn">
    </form>
    
</body>
</html>
<?php require_once("footer.php");?>