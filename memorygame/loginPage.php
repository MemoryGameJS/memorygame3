<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){

// include "conn.php";
$showlogin=false; 
$showError=false; 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userna = $_POST['username'];
  $passwor= $_POST['password'];
 
 

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "forums";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{ 
  // Submit these to a database
  // Sql query to be executed 
 
    $sql = "Select * from forums where username='$userna' AND password='$passwor'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
 
   if ($num==1){
       $showlogin = true;
    $row = mysqli_fetch_assoc($result);
       session_start();
       $_SESSION['loggedin']=true;
       $_SESSION['naam']=$userna;
     
       $_SESSION['sno']=$row['sno'];
       header("location:index.php");
   }

else{
   $showError = "Passwords do not match";
}
}
}




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
<style>
body{
background-image:url("theme.jpg");
background-position: center;
    background-repeat: no-repeat;
background-size:cover;
height:90vh; 
display:flex; 
flex-direction:column; 
justify-content:center; 
align-items:center; 
}

.container{
width:430px!important;

}

</style>
  </head>
  <body>
  <?php
 if($showlogin){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have been logged in 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">�</span>
  </button>
</div>';
}
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>'.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">�</span>
</button>
</div>';
}
?>
  <div class="container my-4">
     <h1 class="text-center text-white">login to our website</h1>
     <form action="loginPage.php " method="post">
        <div class="form-group">
            <label for="username" class="text-white">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password" class="text-white">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
     
         
        <button type="submit" class="btn btn-primary">login</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>