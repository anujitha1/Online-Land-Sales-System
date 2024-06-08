<?php require_once("header.php");?>
<?php require_once("includes/connection.inc.php");?>
<?php

$sql = "SELECT * FROM land WHERE approved_status = 'approved';";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lands.css">
    <style>
        .headingL{
            margin: 35px 0px;
        }
    </style>
</head>
<body>
    <center class="headingL">
    <h1>Lands Page</h1>
    </center>
<?php
    while($record = mysqli_fetch_assoc($result)){

    ?>
    
    <div class="cardContainer">
        <div>
        <div class="card">
            <img src="uploads/<?=$record['image']?>" alt="">
            <div class="cardContent">
                <h2><?php echo $record['title'];?></h2>
                <p><?php echo $record['description'];?></p>
                <p>District - <span><?php echo $record['district'];?></span></p>
                <h3>Rs.<?php echo $record['price'];?></h3>
                <a href="show-land.php?land_id=<?php echo $record['land_id']; ?>">View More</a>
            </div>
        </div>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>
<?php require_once("footer.php");?>