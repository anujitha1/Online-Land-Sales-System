<?php session_start();?>
<?php require_once 'includes/connection.inc.php';?>
<?php

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM land WHERE land_id = $id;";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "Deleted successfully";
    }
}
?>