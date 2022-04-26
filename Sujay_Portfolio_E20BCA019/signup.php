<?php
$success=0;
$user=0;
   if($_SERVER['REQUEST_METHOD']=='POST'){
       include 'connection.php';
       $name=$_POST['name'];
       $email=$_POST['email'];
       $pass=$_POST['pass'];
      
       
   
    $sql="Select * from information where 
    name='$name' and email='$email' ";

    $res=mysqli_query($con,$sql);
    if($res){
        $num=mysqli_num_rows($res);
        if($num > 0 ){
            // echo "User already exist";
            $user=1;
        }else{
            $sql="insert into information (name,email,pass)
                values('$name','$email', '$pass')";
            $res=mysqli_query($con,$sql);
            if($res){
               
                $success=1;
                header('location:login.php');
              }else{
                  die(mysqli_error($con));
               }
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
    <title>Signup Page</title>
   
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no Sorry!</strong><br>User already exist.
    <button type="button" class="close" data-dismiss="alert"
    aria-label="close">
      <span aria-hidden="true">&times;</span></button>
    </div>';
}
?>
<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong><br>You are successfully signed up.
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
<h2 class="text-uppercase text-center mb-5">Create an account</h2>
<form action="signup.php" method="post">
<div class="form-group mt-4">
    <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
    <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mt-4">
    <input type="text" class="form-control" name="name" placeholder="Enter User Id">
  </div>
  <div class="form-group mt-4">
    <input type="password" class="form-control" name="pass" placeholder="Password">
  </div>
  <div class="form-group form-check mt-4">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-secondary mt-4">Signup</button>
  <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>