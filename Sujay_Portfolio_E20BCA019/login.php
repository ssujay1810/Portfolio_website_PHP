<?php
$login=0;
$invalid=0;
   if($_SERVER['REQUEST_METHOD']=='POST'){
       include 'connection.php';
       $name=$_POST['name'];
       $pass=$_POST['pass'];
   
    $sql="Select * from information where 
    name='$name' and pass='$pass' ";

    $res=mysqli_query($con,$sql);
    if($res){
        $num=mysqli_num_rows($res);
        if($num > 0 ){
            $login=1;
            session_start();
            $_SESSION['name']=$name;
            header('location:index.php');
        }else{
            $invalid=1;
        }
           
     }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong><br>User successfully logged in.
    <button type="button" class="close" data-dismiss="alert"
    aria-label="close">
      <span aria-hidden="true">&times;</span></button>
    </div>';
}
?>
<?php
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong><br>Invalid credentials.
    <button type="button" class="close" data-dismiss="alert"
    aria-label="close">
      <span aria-hidden="true">&times;</span></button>
    </div>';
}
?>
<div class="mask d-flex align-items-center h-100 gradient-custom-3 mt-5">
<div class="container h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-12 col-md-9 col-lg-7 col-xl-6">
<div class="card" style="border-radius: 15px;">
<div class="card-body p-5">
<h2 class="text-uppercase text-center mb-5">Login Here</h2>
<form action="login.php" method="post">
  <div class="form-group mb-4">
    <input type="text" class="form-control" name="name" placeholder="Enter User Id">
  </div>
  <div class="form-group mb-4">
    <input type="password" class="form-control" name="pass" placeholder="Password">
  </div>
  <div class="form-group form-check mb-4">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-secondary mt-4">Login</button>
  <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="signup.php" class="fw-bold text-body"><u>Signup here</u></a></p>
</form>
</body>
</html>