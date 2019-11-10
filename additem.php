<?php
session_start();
?>
<html>
<head>
<title>add item</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body style="background-image:url('shopping.jpg');padding-top:60px;padding-bottom:60px">


<div class="card" style="width: 25rem;margin:auto">
  <div class="card-body">
      <h1 class="card-title" style="text-align:center" >Add Items</h1><br>


      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

  
    
    
        <div class="form-group">
          <label for ="t1">Name :</label>
          <input type='text' id='name' class="form-control"  name= 'name' "required maxlength" = "40" required>
          </div>
          <div class="form-group">
          <label for ="t2">Price :</label>
          <input type='text' id='price' class="form-control" name="price"  required>
          </div>
          <div class="form-group">
          <label for ="t3">Product Id (give a unique one) :</label>
          <input type='text' id='id' class="form-control" name="id"  required>
          </div>
          
          
      
          <div class="form-group">
          <label for="t4">Url :</label>
          <input type='text' id='url'class="form-control" name='url' required>
          </div>
  
          <input type="submit" id="submit" name="submit" value="submit"class="btn btn-primary" ><br><br>
          <div>
          <p>View all your products</p>
          <?php
            $email=$_SESSION['email'];
            echo "<a href='sell.php'>Products</a>";
          ?>
          </div>
        </div>
          
      </form>
    
  </div>
</div>
<?php
$email=$_SESSION['email'];
    if (isset($_POST['submit'])) {
        $name=$url=$price=$id="";
        function test($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name=test($_POST["name"]);
            $price=test($_POST["price"]);
            $id=test($_POST["id"]);
            $url=test($_POST["url"]);
        }
        

        $conn = new mysqli("localhost", "bhargav", "iBhargav@1", "bhargav");
        if ($conn->connect_error) {
            die("connection failed: ".$conn->connect_error);
        };
        $sql1 ="SELECT  `id` FROM `shop` WHERE id='".$id."'";
        echo "$sql1";
        $result1 = mysqli_query($conn, $sql1);
        $num=0;
        while ($row = mysqli_fetch_assoc($result1)) {
            $num++;
        }
        if ($num == 0) {
            $sql="INSERT INTO `sell`(`id`, `name`, `email`, `price`, `image`) VALUES ('".$id."','".$name."','".$email."','".$price."','".$url."')";
            echo "$sql";
            $sql3 ="INSERT INTO `shop`(`name`, `email`, `price`, `image`, `id`) VALUES ('".$name."','".$email."','".$price."','".$url."','".$id."')";
            echo "$sql3";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("error");
            }
            $result3 = mysqli_query($conn, $sql3);
            if (!$result3) {
                die("error");
            }
            echo "Product added Successfully!";
        } else {
            echo "IT is Already registered! , Give a unique id";
        }
    }


?>
</body>
</html>