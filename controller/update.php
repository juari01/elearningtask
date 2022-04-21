<?php include 'connection.php';

if(isset($_POST['crsejsid'])){
    $varcrseid = $_POST['crsejsid'];

    $sql = "select id,coursetitle,content,author,date from course where id =$varcrseid";
    $result=mysqli_query($conn,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}else {
    $response['status']=200;
    $response['message']="Invalid or data not found";
}


// if(isset($_POST['crsejsid'])){

    if(isset($_POST['crsejsidSend']) && isset($_POST['titleSend']) && isset($_POST['contentSend']) && isset($_POST['authorSend'])  ) {
    $crseidphp = $_POST['crsejsidSend'];
    $crsetitlephp = $_POST['titleSend'];
    $crsecntntphp = $_POST['contentSend'];
    $crseauthortphp = $_POST['authorSend'];

    $sql = "update course set coursetitle='$crsetitlephp',content='$crsecntntphp', author='$crseauthortphp' where id=$crseidphp";
    $result=mysqli_query($conn,$sql);

    }


?>