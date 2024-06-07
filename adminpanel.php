<?php session_start();?>
<?php require_once 'includes/connection.inc.php';?>
<?php
if(!isset($_SESSION['username'])){
  header('Location: adminlogin.php'); 
}?>
<?php

if (isset($_POST['approve'])) {
    $id = $_POST['landid'];
    $select = "UPDATE land SET approved_status = 'approved' WHERE land_id = $id;";
    $queryEX = mysqli_query($connection, $select);
}

if (isset($_POST['deny'])) {
    $id = $_POST['landid'];
    $select = "DELETE FROM land WHERE land_id = $id;";
    $queryEX = mysqli_query($connection, $select);
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
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: Sora;
      }
      table{
        border-collapse: collapse;
        font-size: 1.1em;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.10);
        margin: 30px 0px;
      }
      table td,th{
        padding: 15px 15px;
      }
      table th{
        color: white;
        background-color: #22744e;
      }
      table tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }
      table tr:last-of-type {
        border-bottom: thin solid #009879;
      }
      .adminds{
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: rgba(38, 57, 77, 0.342) 0px 20px 70px -10px;
        height: 100px;
        background-color: #2a9158;
        color: white;
      }
      .adminds h1{
        margin: 20px;
      }
      .adminds a{
        padding: 10px 15px;
        background-color: #dc3545;
        color: black;
        text-decoration: none;
        border-radius: 5px;
      }
      
    </style>
</head>
<body>
    <div class="adminds">
      <img src="horizonlands.png" alt="" width="100px">
        <h1>Admin Dashboard</h1>
        <h1><?php echo $_SESSION['username'];?></h1>
        <a href="adminlogout.php">Logout</a>
    </div>
    <center>
<table border="1">
        <tr>
            <th>Land ID</th>
            <th>Seller ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>District</th>
            <th>Approved Status</th>
            <th>Accept</th>
        </tr>
        <?php
            $query = "SELECT * FROM land WHERE approved_status = 'pending'";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['land_id']?></td>
            <td><?php echo $row['seller_id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['district']?></td>
            <td><?php echo $row['approved_status']?></td>
            <td>
              <!--I-->
                <form action="adminpanel.php" method="POST">
                    <input type="hidden" name="landid" value="<?php echo $row['land_id']?>">
                    
                    <input type="submit" name="approve" value="approve">
                    <input type="submit" name="deny" value="deny">
                </form>
            </td>
        </tr>
</table>
</center>

    <?php
            }
    ?>


    <!-- <center>
    <h1>Lands</h1>
    </center> -->

</body>
</html>

<?php
$query = mysqli_query($connection, "SELECT * FROM land;");

$results = mysqli_num_rows($query);

if ($results > 0) {
  echo "<center>";
  echo "<h1>Lands</h1>";
  echo "<table border='1'>";
  echo "<thead><tr><th>Land Id</th><th>Seller Id</th><th>Title</th><th>Description</th><th>Price</th><th>District</th><th>Approved Status</th><th>Edit</th><th>Delete</th></tr></thead>";
  while ($row = mysqli_fetch_array($query)) {
    $idl = $row['land_id'];
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$row['land_id']}</td>";
    echo "<td>{$row['seller_id']}</td>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "<td>{$row['district']}</td>";
    echo "<td>{$row['approved_status']}</td>";
    echo "<td><a href=\"adminupdateland.php?land_id={$row['land_id']}\">Edit</a></td>";
    echo "<td><a href=\"deleteland.php?delete_id=$idl\">Delete</a></td>";
    echo "</tr>";
    echo "</tbody>";
  }
  echo "</table>";
  echo "</center>";
  echo "<center>";
  echo "<h1>Sellers</h1>";
  echo "</center>";
} else {
  echo "No land found for this user.";
}
//a
$query2 = mysqli_query($connection, "SELECT * FROM newusers;");

$results2 = mysqli_num_rows($query2);

if ($results2 > 0) {
  echo "<center>";
  echo "<table border='1'>";
  echo "<thead><tr><th>Seller Id</th><th>Name</th><th>Email</th><th>Username</th><th>Password</th><th>Phone Number</th><th>Edit</th><th>Delete</th></tr></thead>";
  while ($row2 = mysqli_fetch_array($query2)) {
    $idl2 = $row2['userId'];
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$row2['userId']}</td>";
    echo "<td>{$row2['name']}</td>";
    echo "<td>{$row2['email']}</td>";
    echo "<td>{$row2['username']}</td>";
    echo "<td>{$row2['password']}</td>";
    echo "<td>{$row2['phonenumber']}</td>";
    echo "<td><a href=\"edituser.php?user_id={$row2['userId']}\">Edit</a></td>";
    echo "<td><a href=\"deleteuser.php?delete_id=$idl2\">Delete</a></td>";
    echo "</tr>";
    echo "</tbody>";
  }
  echo "</table>";
  echo "</center>";
} else {
  echo "No seller found.";
}

$query3 = mysqli_query($connection, "SELECT * FROM inquiry;");

$results3 = mysqli_num_rows($query3);

if ($results3 > 0) {
  echo "<center>";
  echo "<h1>Inquiries</h1>";
  echo "<table border='1'>";
  echo "<thead><tr><th>Inquiry Id</th><th>Users Name</th><th>Phone Number</th><th>Message</th></tr></thead>";
  while ($row3 = mysqli_fetch_array($query3)) {
    //$idl3 = $row3['userId'];
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$row3['inquiry_id']}</td>";
    echo "<td>{$row3['users_name']}</td>";
    echo "<td>{$row3['phone_number']}</td>";
    echo "<td>{$row3['message']}</td>";
    echo "</tr>";
    echo "</tbody>";
  }
  echo "</table>";
  echo "</center>";
} else {
  echo "No seller found.";
}

?>