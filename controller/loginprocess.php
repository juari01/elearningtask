<?php include 'connection.php';

session_start();

if(isset($_POST['login'])){ 

    $username = $_POST['loginsend'];
    $password = md5($_POST['passwordsend']);

    $sql = "select id from users where username ='$username' and password ='$password'";
    $result=mysqli_query($conn,$sql);

    
    if ($result->num_rows > 0) {
        $_SESSION['loggIN'] = '1';
        $_SESSION['username'] = $username;

        while($array=mysqli_fetch_row($result)) {
            $_SESSION['user_id'] = $array[0];
        
             }
    

        echo "success";

    }
     else
     exit('<font color="red"> Username or password incorrect!</font>');

}

?>