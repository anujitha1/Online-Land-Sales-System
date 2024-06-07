<?php require_once 'sellerheader.php';?>
<?php session_start(); ?>
<?php require_once 'includes/connection.inc.php';?>
<?php
if(!isset($_SESSION['userId'])){
    header('Location: sellerlogin.php'); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
      .heading{
        margin-top: 30px;
      }
      div.heading2{
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 20px;
      }
      .items a{
        color: white;
        padding: 10px 10px;
        background: #036cce;
        text-decoration: none;
        border-radius: 5px;
      }
    </style>
</head>
<body>
    <center>
    <h1 class="heading">Welcome ! <?php echo $_SESSION['username']; ?></h1>
    </center>
    <br>

    <div class="heading2">
      <div class="items">
        <h1>My lands</h1>
      </div>
      <div class="items">
        <a href="add-newland.php">Add new land</a>
      </div>
    </div>

</body>
</html>
<?php
$user = $_SESSION['userId'];
$querys = mysqli_query($connection, "SELECT * FROM newusers WHERE userId = '$user';");
$row = mysqli_fetch_array($querys);
$id = $row['userId'];

$query2 = mysqli_query($connection, "SELECT * FROM land WHERE seller_id = '$id';");

$results = mysqli_num_rows($query2);

if ($results > 0) { // Check if there are any results before looping
  echo "<center>";
  echo "<table class='tableStyle'>";
  echo "<thead><tr><th>Title</th><th>Description</th><th>Price</th><th>District</th><th>Approved Status</th><th>Edit</th><th>Delete</th></tr></thead>";
  while ($row = mysqli_fetch_array($query2)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "<td>{$row['district']}</td>";
    echo "<td>{$row['approved_status']}</td>";
    echo "<td><a href=\"update-land.php?land_id={$row['land_id']}\">Edit</a></td>";
    echo "<td><a href=\"delete-land.php?land_id={$row['land_id']}\">Delete</a></td>";
    echo "</tr>";
    echo "</tbody>";
  }
  echo "</table>";
} else {
  echo "No land found for this user.";
}

echo "<h1>Inquiries</h1><br>";
$query3 = mysqli_query($connection, "SELECT * FROM inquiry;");
$resultSet = mysqli_num_rows($query3);

if($resultSet>0){
  echo "<table border='1' class='tableStyle'>";
  echo "<thead><tr><th>Inquiry ID</th><th>Name</th><th>Phone Number</th><th>Message</th></tr></thead>";
  while($rows = mysqli_fetch_array($query3)){
    echo "<tr>";
    echo "<td>{$rows['inquiry_id']}</td>";
    echo "<td>{$rows['users_name']}</td>";
    echo "<td>{$rows['phone_number']}</td>";
    echo "<td>{$rows['message']}</td>";
    echo "</tr>";
  }
}
echo "</table>";
?>
<?php mysqli_close($connection);?>