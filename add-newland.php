<?php require_once 'sellerheader.php';?>
<?php session_start(); ?>
<?php require_once 'includes/connection.inc.php';?>
<?php
if(!isset($_SESSION['userId'])){
    header('Location: sellerlogin.php'); 
}
?>
<?php

    $user = $_SESSION['userId'];
    $querycheck = mysqli_query($connection, "SELECT * FROM newusers WHERE userId = '$user';");
    $row = mysqli_fetch_array($querycheck);
    $id = $row['userId'];

if (isset($_REQUEST['submit'])) {
    $title = $_REQUEST['title'];
    $des = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $dis = $_REQUEST['district'];


    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTempName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExtention = explode(".", $fileName);
    $fileActualExtension = strtolower(end($fileExtention));
    $allowedTypes = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExtension, $allowedTypes)) {
        if ($fileError === 0) {
            if ($fileSize < 100000000) {
                $newFileName = uniqid('', true).".".$fileActualExtension;
                $fileDestination = "uploads/". $newFileName;
                move_uploaded_file($fileTempName, $fileDestination);

                //sql image inserting
                // $sql = "INSERT INTO imagesnew (images) VALUES('$newFileName')";
                // mysqli_query($connection, $sql);
                mysqli_query($connection, "INSERT INTO land (title,description,price,image,district,seller_id) VALUES ('$title', '$des', '$price', '$newFileName', '$dis', '$id');");
                echo "Land added";
                //header('Location: sellerdashboard.php');
            }
            else {
                echo "Your file is too large !";
            }
        }
        else {
            echo "There was an error uploading";
        }
    }
    else {
        echo "You cannot upload files of this type !";
    }
    
    //header('Location: sellerdashboard.php');
}

if(isset($_GET['land_id'])){
    $land_id = mysqli_real_escape_string($connection, $_GET['land_id']);
    $query = "SELECT * FROM land WHERE land_id = {$land_id} LIMIT 1;";
    $result_set = mysqli_query($connection, $query);

    if($result_set){
        if(mysqli_num_rows($result_set) == 1){
            $result = mysqli_fetch_assoc($result_set);
            $title = $result['title'];
        }
        else{

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
    <style>
        body{
            
            font-family: 'Sora', sans-serif;
        }
        .headingcenter{
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .headingcenterItem{
            margin-right: 30px;
        }
        .mainform{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            padding: 30px;
        }
        .form .inputarea,select{
            width: 100%;
            margin-top: 20px;
        }
        .form .inputarea input,select{
            position: relative;
            height: 50px;
            width: 100%;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 0px 15px;
        }
        .inputboxs{
            background: #036cce;
            color: white;
        }
    </style>
</head>
<body>
    
    <!-- <form action="add-newland.php" method="POST" enctype="multipart/form-data">
        Title
        <input type="text" name="title"><br><br>

        Description
        <input type="text" name="description"><br><br>

        Price
        <input type="text" name="price"><br><br>

        Image<br>
        Remember once you uploaded the image you cannot edit it.<br>
        <input type="file" name="image"><br><br>

        District
        <input type="text" name="district"><br><br>

        <input type="submit" value="Submit new land" name="submit">
    </form> -->
    <div class="headingcenter">
        <div class="headingcenterItem">
            <h1>Add new land</h1>
        </div>
        <div class="headingcenterItem">
            <a href="sellerdashboard.php" style="float: right;">Go back</a>
        </div>
    </div>

    <section class="mainform">
    <form action="add-newland.php" class="form" method="POST" enctype="multipart/form-data">
        <div class="inputarea">
            <p>Title</p>
            <input type="text" name="title" class="inputbox" placeholder="Ex: Land in Moratuwa">
        </div>
        <div class="inputarea">
            <p>Description</p>
            <input type="text" name="description" class="inputbox">
        </div>
        <div class="inputarea">
            <p>Price</p>
            <input type="number" name="price" class="inputbox" placeholder="Ex: Rs.12,000,00">
        </div>
        <div class="inputarea">
            <p>Image</p>
            <input type="file" name="image" class="inputbox">
        </div>
        <div class="inputarea">
            <p>District</p>
            <select name="district" id="">
                <option>District</option>
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambanthota">Hambanthota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullaitivu">Mullaitivu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select>
            <!--<input type="text" name="district" class="inputbox" placeholder="Ex: Colombo">-->
        </div>
        <div class="inputarea">
            <input type="submit" name="submit" class="inputboxs" placeholder="Ex: Colombo" value="Add">
        </div>
    </form>
    </section>
    
</body>
</html>