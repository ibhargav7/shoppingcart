<?php
session_start();
?>
<!DOCTYPEhtml>
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
  
        <li><a href="buy.php">Buy Products</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <?php
        $email=$_SESSION["email"];
     
        echo "<li><a href='additem.php'><span class='glyphicon glyphicon-plus'></span> Add Item</a></li>";
        ?>
        </ul>
    </div>
  </div>
</nav>

<div class="container"> 
<div class="row">



<?php
function  Delete(){
    $conn = new mysqli("localhost", "root", "", "db");
    if ($conn->connect_error) {
        die("connection failed: ".$conn->connect_error);
        $id=$_GET['id'];
        $sql4='DELETE FROM `sell` WHERE id='.$id.'';
    }
}
$conn = new mysqli("localhost", "bhargav", "iBhargav@1", "bhargav");
if ($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
};
$email=$_SESSION['email'];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


$num=0;
$sql = 'SELECT * FROM sell WHERE email="'.$email.'"';

$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
  $num++;
}
if($num!=0){
    $result1 = mysqli_query($conn,$sql);
    $products = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    foreach ($products as $product) {
        echo "<div class='col-sm-4'><div class='panel panel-primary'>
  <div class='panel-heading'> ". $product['name']. "</div>
  <div class='panel-body'>
  <img src='". $product['image']." width ='190px' height ='121px'></div>
  <div class='panel-footer'>Price = ₹ ". $product['price']. "<button class='btn btn-primary' onclick=\"location.href='".$url."?id=". $product['id']."'\" style='margin-left:40px'>Remove</button>
  </div></div></div>";
    };
}else{
  echo "<img src='nothing-found.png' ";
}
if (isset($_GET['id'])) {
  Delete();
}
$_SESSION["email"]=$email;

$conn->close();
?>
</div>
</div><br><br>



</body>
</html>
