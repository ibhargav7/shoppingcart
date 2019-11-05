<html>
<head>
<title>log in</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color:#007bffd1;padding-top:60px;padding-bottom:60px">


<div class="card" style="width: 25rem;margin:auto">
  <div class="card-body">
    <h1 class="card-title" style="text-align:center" >Login</h1><br>

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="form-group">
    
    <label>Email</label>
    <input type='email' id='email' name= 'email' class="form-control" "required maxlength" = "50" required>
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type='password' id='password' name='password' class="form-control" 'required maxlength' = '24' required>
    </div>
    <input type="submit" id='submit1' value="Login" class="btn btn-primary">
    </form>
    <div>
    <p>New to this site then: <p><a href="http://localhost/shoppingcart/registration.php">Sign In</a>
    </div>
</div>
<?php
 $name=$email=$password=$phoneno=$country="";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
 
     $email=test($_POST["email"]);
     $password=test($_POST["password"]);
 
     
 }
 function test($data){
     $data=trim($data);
     $data=stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;

 }
$servername = "localhost";
$username = "bhargav";
$password = "iBhargav@1";

$conn = new mysqli($servername,$username,$password,"bhargav");
if ($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
};
$sql="SELECT `email`, `password` FROM `login` WHERE email='".$email."'";

$result = mysqli_query($conn, $sql);
$product=mysqli_fetch_assoc($result);



if($product["password"] == "$password"){
    echo "login Successful";

}
else{
    echo "email id and password is incorrect";
}

?>
</body>
</html> 