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

// if (isset($_REQUEST['submit'])) {
//     $title = $_REQUEST['title'];
//     $des = $_REQUEST['description'];
//     $price = $_REQUEST['price'];
//     $dis = $_REQUEST['district'];

//     mysqli_query($connection, "INSERT INTO land (title,description,price,district,seller_id) VALUES ('$title', '$des', '$price', '$dis', '$id');");
//     header('Location: sellerdashboard.php');
// }

if(isset($_GET['land_id'])){
    $land_id = mysqli_real_escape_string($connection, $_GET['land_id']);
    $query = "SELECT * FROM land WHERE land_id = {$land_id} LIMIT 1;";
    $result_set = mysqli_query($connection, $query);

    if($result_set){
        if(mysqli_num_rows($result_set) == 1){
            $result = mysqli_fetch_assoc($result_set);
            $title = $result['title'];
            $des = $result['description'];
            $price = $result['price'];
            $dis = $result['district'];
        }
        else{

        }
    }
}

if (isset($_POST['submitnew'])) {
    $landidUpdate = $_POST['landid'];
    $titleUpdate = $_POST['title'];
    $descriptionUpdate = $_POST['description'];
    $priceUpdate = $_POST['price'];
    $districtUpdate = $_POST['district'];

    $updateQuery = "UPDATE land SET title = '$titleUpdate', description = '$descriptionUpdate', price = '$priceUpdate', district = '$districtUpdate' WHERE land_id = '$landidUpdate';";
    mysqli_query($connection, $updateQuery);
    header('Location: sellerdashboard.php');
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
            font-family: Sora;
        }
        center{
            margin-top: 30px;
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
    <center>
    <h1>Edit land details</h1>
    </center>
    <!--<a href="sellerdashboard.php" style="float: right;">Go back</a>
    <form action="update-land.php" method="POST">
        Land ID
        <input type="hidden" name="landid" value="<?php //echo $land_id; ?>">

        Title
        <input type="text" name="title" value="<?php //echo $title; ?>">

        Description
        <input type="text" name="description" value="<?php //echo $des; ?>">

        Price
        <input type="text" name="price" value="<?php //echo $price; ?>">

        District
        <input type="text" name="district" value="<?php //echo $dis; ?>">

        <input type="submit" value="Update" name="submitnew">
    </form>-->




    <section class="mainform">
    <form action="update-land.php" method="POST" class="form">
        <div class="inputarea">
            <input type="hidden" name="landid" class="inputbox" value="<?php echo $land_id; ?>">
        </div>
        <div class="inputarea">
            <p>Title</p>
            <input type="text" name="title" class="inputbox" value="<?php echo $title; ?>">
        </div>
        <div class="inputarea">
            <p>Description</p>
            <input type="text" name="description" class="inputbox" value="<?php echo $des; ?>">
        </div>
        <div class="inputarea">
            <p>Price</p>
            <input type="text" name="price" class="inputbox" value="<?php echo $price; ?>">
        </div>
        <div class="inputarea">
            <p>District</p>
            <select name="district" id="">
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
            <input type="submit" name="submitnew" class="inputboxs" value="Update">
        </div>
    </form>
    </section>
</body>
</html>