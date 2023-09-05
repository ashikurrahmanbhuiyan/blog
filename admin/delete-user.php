<?php
include "config.php";
$userid = $_GET['id'];

$sql = "delete from user where user_id = '{$userid}'";
$result = mysqli_query($conn, $sql) or die("quary failed");

if ($result) {
    header("Location: {$hostname}/admin/users.php");
    echo "<p>delete sucessfel</p>";
}
else{
    echo "<p>delete unsucessfel</p>";
}
?>