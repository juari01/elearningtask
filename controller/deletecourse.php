<?php include 'connection.php';


if(isset($_POST['deletesend'])){
    $varcrseid= $_POST['deletesend'];

    $sql = "delete from course where id =$varcrseid";
    $result=mysqli_query($conn,$sql);


    unset($_SESSION['crseid']);
}


?>