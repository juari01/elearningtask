<?php 
include ('../controller/connection.php');
session_start();
if (!isset($_SESSION['loggIN'])) {
  header('Location: ../view/login.php');
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="../css/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Course Details!</title>
  </head>

  <?php include ('../view/header.php'); ?>

  
  
<body>
<div class="container">  
<h1 class="text-center my-3">Course Details</h1>
<hr> 

<?php include ('../controller/fetchcourse.php'); ?>


<?php if ($result->num_rows > 0); ?>
<?php while($array=mysqli_fetch_row($result)) {; ?>
  <input type="hidden" id="crseidinput" name="crseidinput" value="<?php echo $array[0]; ?>">
<table class="table table-striped table-bordered mt-4">
<thead class="thead-dark">
      <tr>
        <th scope="col">Course title</th>
        <th scope="col"><?php echo $array[1]; ?></th>
      </tr>
    </thead>
  <tbody>

    <tr>
      <th scope="row">Content</th>
      <td><b><?php echo $array[2]; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Author</th>
      <td><b><?php echo $array[3]; ?></b></td>
    </tr>
    <tr>
      <th scope="row">Date</th>
      <td><b><?php echo $array[4]; }?></b></td>

    </tr>

  </tbody>
</table>

<div style="text-align: center; display:none;" id="updatedelete">
<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#editcrsemodal" onclick="edtcrseID()">Update</button>
<button type="button" class="btn btn-danger my-3" onclick="deletecrse()">Delete courses</button>
</div>

<div class="modal fade" id="editcrsemodal" tabindex="-1" role="dialog" aria-labelledby="addmodlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addmodtitleLabel">Update course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post">
        <div class="form-group my-2">
        <label for="course">Course title</label>
        <input type="text" class="form-control" id="edtcoursetitle">
        </div>

        <div class="form-group  my-2">
        <label for="course">Content</label>
        <input type="text" class="form-control" id="edtcontent">
        </div>

        <div class="form-group  my-2">
        <label for="author">author</label>
        <input type="text" class="form-control" id="edtauthor">
        </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveeditcourse()">Save</button>
      </div>
    </div>
  </div>
</div>


</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>

  <script>

$( document ).ready(function() {
  var deleteupdte='<?php echo $_SESSION['username'];?>';

   if(deleteupdte=="admin")
   {
    var jsdeleteupdte = document.getElementById('updatedelete');
    jsdeleteupdte.style.display = 'block';
   }
});



function deletecrse(){ 

  let confirmAction = confirm("Are you sure you want to delete this course?");
        if (confirmAction) {
    
          var crsejsid = document.getElementById("crseidinput").value; 

    $.ajax({
    type: 'POST',
    url: "../controller/deletecourse.php",
    data: {
    deletesend: crsejsid
    },
    success:function(data,status){

      alert("Course successfully deleted");
      window.location.href="../view/index.php";
 
    }
    }); 

        }

 }


 function edtcrseID() {

   var crsejsid = document.getElementById("crseidinput").value;

   $.post("../controller/update.php", {
       crsejsid: crsejsid
     }

     ,
     function (data, status) {
       var varcrseid = JSON.parse(data);
       $('#edtcoursetitle').val(varcrseid.coursetitle);
       $('#edtcontent').val(varcrseid.content);
       $('#edtauthor').val(varcrseid.author);
     }

   );

 }

    function saveeditcourse() {

      var crsejsid = document.getElementById("crseidinput").value;
      var crsetitle = $('#edtcoursetitle').val();
      var crsecntnt = $('#edtcontent').val();
      var crseauthor = $('#edtauthor').val();

      $.ajax({
        url: "../controller/update.php",
        type: 'POST',
        data: {
          crsejsidSend: crsejsid,
          titleSend: crsetitle,
          contentSend: crsecntnt,
          authorSend: crseauthor

        },
        success: function (data, status) {
          location.reload();
        }

      });

    };

  </script>

    
  </body>
</html>