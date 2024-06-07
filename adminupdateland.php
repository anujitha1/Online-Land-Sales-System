<?php session_start(); ?>
<?php require_once 'includes/connection.inc.php';?>
<?php

    // $user = $_SESSION['userId'];
    // $querycheck = mysqli_query($connection, "SELECT * FROM newusers WHERE userId = '$user';");
    // $row = mysqli_fetch_array($querycheck);
    // $id = $row['userId'];

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
    <h1>Edit land details</h1>
    </center>
    <a href="adminpanel.php" style="float: right;">Go back</a>
    <form action="adminupdateland.php" method="POST" class="forms">
        <input type="hidden" name="landid" value="<?php echo $land_id; ?>"><br>

        Title
        <input type="text" name="title" value="<?php echo $title; ?>"><br>

        Description
        <input type="text" name="description" value="<?php echo $des; ?>"><br>

        Price
        <input type="text" name="price" value="<?php echo $price; ?>"><br>

        District
        <input type="text" name="district" value="<?php echo $dis; ?>"><br>

        <input type="submit" value="Update" name="submitnew">
    </form>
</body>
</html>