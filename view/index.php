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
    <title>E-learing courses!</title>
  </head>

  <?php include 'header.php';?>
  
  
<body>





<div class="container">  
<h1 class="text-center my-3">List of courses</h1>
<hr>
<button style="display:none;" id="addcrse" type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#addcoursemod">Add courses</button>


<div class="modal fade" id="addcoursemod" tabindex="-1" role="dialog" aria-labelledby="addmodlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addmodtitleLabel">Add course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post">
        <div class="form-group my-2">
        <label for="course">Course title</label>
        <input type="text" class="form-control" id="coursetitle" placeholder="Enter course">
        </div>

        <div class="form-group  my-2">
        <label for="course">Content</label>
        <input type="text" class="form-control" id="content" placeholder="Enter content">
        </div>

        <div class="form-group  my-2">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" placeholder="Enter author">
        </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addcourse()">Save</button>
      </div>
    </div>
  </div>
</div>


<div id="displaycrsetable"></div>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>


    <script>

      $(document).ready(function() {

      displaycrsetble();

      var jsusername='<?php echo $_SESSION['username'];?>';

      if(jsusername=="admin")
      {
      var varjsusername = document.getElementById('addcrse');
      varjsusername.style.display = 'block';
      }


      });

      function displaycrsetble(){
      var displayData="true";
      $.ajax({
      url: "../controller/listcourse.php",
      type:'POST',
      data: {
      displaySend:displayData

      },
      success:function(data,status){
      $('#displaycrsetable').html(data);

      }

      });
      }

      function addcourse(){

        var crsetitle=$('#coursetitle').val();
        var crsecntnt=$('#content').val();
        var crseauthor=$('#author').val();

        $.ajax({
          url: "../controller/insert.php",
          type:'POST',
          data: {
            titleSend:crsetitle,
            contentSend:crsecntnt,
            authorSend:crseauthor

          },
        success:function(data,status){
        alert("Course successfully added!");
        var crsetitle=$('#coursetitle').val("");
        var crsecntnt=$('#content').val("");
        var crseauthor=$('#author').val("");
        displaycrsetble();

        $('#addcoursemod').modal('hide');
        
          }

        });
        
      }

      function seecrsedtls(crseid){ 

        var crseidhold = crseid;
        $.ajax({
        type: 'POST',
        url: "../controller/fetchcourse.php",
        data: {
            crsesend: crseidhold
        },
  success:function(data,status){
    // window.location.href = "http://localhost/elearning/controller/coursedetails.php";
    window.location.href="../view/coursedetails.php";
      }
    }); 



         }

     
    </script>


  </body>

</html>