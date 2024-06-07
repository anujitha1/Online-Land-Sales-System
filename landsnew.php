<?php require_once("includes/connection.inc.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $sql = "SELECT * FROM imagesnew";
    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res) > 0){
        while($images = mysqli_fetch_assoc($res)){?>
        <div>
            <img src="uploads/<?=$images['images']?>" width="100px">
        </div>

    <?php }}?>
</body>
</html>