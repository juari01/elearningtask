<?php 
include 'connection.php';

extract($_POST);

if(isset($_POST['titleSend']) && isset($_POST['contentSend']) && isset($_POST['authorSend'])  )


{
	session_start();

  $userid = $_SESSION['user_id'];

$date = date('Y-m-d');
$sql = "INSERT INTO `course`( `user_id`,`coursetitle`, `content`,`author`,`date`)
	VALUES ('$userid','$titleSend','$contentSend','$authorSend','$date')";
$result=mysqli_query($conn,$sql);

}



?>