<?php 
include ('../controller/connection.php');


if(isset($_POST['crsesend'])){
    session_start();
    $varcrse = $_SESSION['crseid'] = $_POST['crsesend'];
}

$sql = "SELECT id, coursetitle, content, author,date FROM course where id =  '".$_SESSION['crseid']."'";
$result=mysqli_query($conn,$sql);


?>