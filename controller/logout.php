<?php include 'connection.php';

session_start();
unset($_SESSION['loggIN']);
unset($_SESSION['user_id']);
unset($_SESSION['username']);
session_destroy();
header('Location: ../view/index.php');
exit();


?>