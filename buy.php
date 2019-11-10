

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shooping cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .header {
      margin-bottom:0;
      background-color:#00e6e6;
      text-align: left;
       ;

    }
   
    /* Add a gray background color and some padding to the footer */
  
  </style>
</head>
<body>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Online Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
  
        <li><a href="sell.php">Sell Products</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Cart</a></li>";
        
      </ul>
    </div>
  </div>
</nav>

<div class="container"> 
<div class="row">




<?php
$conn = new mysqli("localhost","bhargav","iBhargav@1","bhargav");
if ($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
};
$email=$_SESSION["email"];


function cart() {
  global $email;
  $id=$_GET["id"];
 
  $conn = new mysqli("localhost","bhargav","iBhargav@1","bhargav");
  if ($conn->connect_error) {
      die("connection failed: ".$conn->connect_error);
  }
  $sql3="SELECT `name`, `price`, `image`, `id` FROM `shop` WHERE id='".$id."'";
  
  $result3 = mysqli_query($conn,$sql3);
  if (!$result3){
      die("error");
  }
  $product3=mysqli_fetch_assoc($result3);

  $sql1  = "INSERT INTO `cart`(`id`, `name`, `email`, `price`, `quantity`, `image`) VALUES ('".$id."','". $product3['name']."','". $email."','". $product3['price']."',1,'".$product3['image']."')";

  $result1 = mysqli_query($conn,$sql1);
 
};

$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$sql = 'SELECT * FROM shop';
$result = mysqli_query($conn,$sql);
$products = mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach ($products as $product){
   
  echo "<div class='col-sm-4'><div class='panel panel-primary'>
  <div class='panel-heading'> ". $product['name']. "</div>
  <div class='panel-body'>
  <img src='". $product['image']." width ='190px' height ='121px'></div>
  <div class='panel-footer'>Price = ₹ ". $product['price']. "<button class='btn btn-primary' onclick=\"location.href='".$url."?id=". $product['id']."'\" style='margin-left:40px'>Add to Cart</button>
  </div></div></div>";
  };

  if (isset($_GET['id'])) {
    cart();
  }
  $_SESSION["email"]=$email;

 

$conn->close();
?>
</div>
</div><br><br>



</body>
</html>