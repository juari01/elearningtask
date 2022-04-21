<?php
include ('../controller/connection.php');


?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="css/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Elearing course!</title>
  </head>

  
<body style="background-color: #54d400;">


<section class="mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="text" id="username" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <!-- <div class="alert alert-danger" role="alert" id="response" style="display: none;">
               
            </div> -->
            <p id="response"></p>


            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="login()">Login</button>

            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>

    <script type="text/javascript">

        function login(){ 
            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({
            type: 'POST',
            // url: 'controller/loginprocess.php',
            url: "../controller/loginprocess.php",
            data: {
            login: 1,
            loginsend: username,
            passwordsend: password
            },
            success:function(response){
           
                // var test1 = $('#response').html(response);

          if(response=="success")
          {
            // window.location.href="index.php";
            window.location.href="../view/index.php";
            
          }  else
          {
          $('#response').html(response);
          }
                    
                

            },
            dataType: 'text'
            }); 

        }

    </script>

</body>


</html>