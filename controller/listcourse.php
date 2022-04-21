<?php 
include ('../controller/connection.php');
session_start();

if(isset($_POST['displaySend'])){
  
    $table ='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Course Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';
  

    $sql="SELECT id, coursetitle FROM course";
    $result=mysqli_query($conn,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $crsetitle=$row['coursetitle'];

        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$crsetitle.'</td>
        <td><button type="button" class="btn btn-success " onclick="seecrsedtls('.$id.')">Open</button></td>
        </tr>';
        $number++;
    }
    $table.='</table>';

    echo $table;
    
        
    }

?>