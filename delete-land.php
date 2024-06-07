<?php session_start(); ?>
<?php require_once 'includes/connection.inc.php';?>
<?php

if(!isset($_SESSION['userId'])){
    header('Location: sellerlogin.php'); 
}

?>
<?php
echo "Are you sure?";

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

if (isset($_POST['delete'])) {
    $landid = $_POST['landid'];
    $sqlDelete = "DELETE FROM land WHERE land_id = $landid;";
    $querycheck = mysqli_query($connection, $sqlDelete);
    if ($querycheck) {
        echo "<p>Land deleted successfully.</p>";
        header('Location: sellerdashboard.php');
        // Redirect after a short delay (optional)
        // header('refresh:2; url=sellerdashboard.php');
    } else {
        echo "<p>Error deleting land.</p>";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <form action="delete-land.php" method="POST">
                Land ID<?php echo $land_id; ?>
                <input type="hidden" name="landid" value="<?php echo $land_id; ?>">

                <input type="submit" value="Delete" name="delete">
            </form>
    
</body>
</html>