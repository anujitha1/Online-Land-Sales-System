<?php session_start();?>
<?php require_once 'includes/connection.inc.php';?>
<?php

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM newusers WHERE userId = $id;";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "Deleted successfully";
    }
}
?>