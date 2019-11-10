<?php
session_start();
?>
<!DOCTYPEhtml>
<html lang="en">
    <head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <script>
    function Ajax(x) {
  
        $.post('cart.php',{id:x})

      };
    
     </script>

    <style>
        #container{
            background-color: greenyellow;
        }
    </style>

    <body>
        <div class="jumbotron" id= "container">
        <div class="container text-center">
        <?php
            $email=$_SESSION['email'];
            echo "<a href='buy.php'><h3 style='text-align:right'>Back to Store</h3></a>"
        ?>    
        <h1>Your Cart</h1>    
        </div>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price(in ₹)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            
                        <?php
                 

                        $conn = new mysqli("localhost", "root", "", "");
                        if ($conn->connect_error){
                            die("connection failed: ".$conn->connect_error);
                        };
                        $email=$_SESSION['email'];

                        
                        $sql3 = 'SELECT * FROM `cart` WHERE email="'.$email.'"';
                        
                        $result3 = mysqli_query($conn,$sql3);

                        
                        $num=0;
                  

                        while ($row = mysqli_fetch_assoc($result3)) {
                          $num++;
                        }
                        $result4= mysqli_query($conn,$sql3);
                        $cproducts = mysqli_fetch_all($result4,MYSQLI_ASSOC);
                        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        
                        foreach ($cproducts as $cproduct){
                        
                            echo "<tr><td><img src='". $cproduct['image']."' style='width: 70px'</img></td><td>". $cproduct['name']."</td><td>". $cproduct['price']."</td><td><button class='btn btn-primary' onclick='Ajax(".$cproduct['id'].")'>Delete</button></td></tr>";
                        }


                        if (isset($_POST['id'])) {
                            echo $_POST['id'];
                            
                            $conn = new mysqli("localhost", "root", "", "db");
                            if ($conn->connect_error){
                                die("connection failed: ".$conn->connect_error);
                            $id=$_GET['id'];
                                $sql4='DELETE FROM `cart` WHERE id='.$id.'';
                                echo "$sql4";
                            };
                        }
 
                        $sql4 = 'SELECT sum(price) as total FROM cart WHERE email="'.$email.'"';
                        $result4 = mysqli_query($conn,$sql4);
                        $row=mysqli_fetch_array($result4);
                        $total=$row["total"];
                        $_SESSION["email"]=$email;

                    
                        
                        $conn->close();
                    
                        ?>
                    <tr>
                        <td><h4>Total Price<h4></td>
                        <td></td>
                        <td><?php  echo "$total";?></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </body>
</html>
