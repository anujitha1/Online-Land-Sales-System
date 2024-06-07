<?php require_once("header.php");?>
<?php require_once("includes/connection.inc.php");?>
<?php

$land_id = isset($_GET['land_id']) ? $_GET['land_id'] : null;

if ($land_id) {
    // Fetch land details (assuming seller_id references newusers.userId)
    $sql_land = "SELECT * FROM land WHERE land_id = $land_id;";
    $result_land = mysqli_query($connection, $sql_land);
  
    if (mysqli_num_rows($result_land) > 0) {
      $land_details = mysqli_fetch_assoc($result_land);
  
      // Display detailed land information here
      echo "<div class='content'>";
      echo "<img class='image' src=\"uploads/" . $land_details['image'] . "\">";
      echo "<h1>", $land_details['title'], "</h1>";
      echo "<p>Description: ", $land_details['description'], "</p>";
      echo "<p>District: ", $land_details['district'], "</p>";
      echo "<p>Price: Rs. ", $land_details['price'], "</p>";
      
      // Fetch seller details
      $land_seller_id = $land_details['seller_id'];
      $sql_seller = "SELECT name,phonenumber FROM newusers WHERE userId = $land_seller_id;";
      $result_seller = mysqli_query($connection, $sql_seller);
  
      if (mysqli_num_rows($result_seller) > 0) {
        $seller_details = mysqli_fetch_assoc($result_seller);
        echo "<h2>Seller Details</h2>";
        echo "<p>Seller Name: ", $seller_details['name'], "</p>";
        echo "<p>Contact Number: ", $seller_details['phonenumber'], "</p>";
        echo "</div>";
      } else {
        echo "<p>Seller details not found.</p>";
      }
  
      // Add additional details as needed...
    } else {
      echo "No land found with ID: $land_id";
    }
  } else {
    echo "Invalid land ID";
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
    .content{
      margin-top: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .content h1,p{
      margin: 10px;
    }
  </style>
</head>
<body>
  
</body>
</html>

<?php require_once("footer.php");?>