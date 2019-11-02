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

    <style>
        #container{
            background-color : #79d2a6
        }
    </style>

    <body>
        <div class="jumbotron" id= "container">
        <div class="container text-center">
            <h1>Your Cart</h1>    
        </div>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Price(in ₹)</th>
                    </tr>
                </thead>
                <tbody>
            
                        <?php
                        $servername = "localhost";
                        $username = "bhargav";
                        $password = "iBhargav@1";

                        $conn = new mysqli($servername,$username,$password,"bhargav");
                        if ($conn->connect_error){
                            die("connection failed: ".$conn->connect_error);
                        };
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($conn,$_GET['id']);

                          
                        
                            $sql = "SELECT * FROM shop WHERE id =".$id ;
                        
                            $result = mysqli_query($conn,$sql);
                            if (!$result){
                                die("error");
                            }
                       
                            
                            $product=mysqli_fetch_assoc($result);
                            $sql2 = "INSERT INTO cart ('id', 'name', 'price') VALUES (".$product['id'].",'".$product['name']."',".$product['price'].")";
                            
                            $result2 = mysqli_query($conn,$sql2);
                        
                            if(!$result2) {
                                die("error1");
                            }
                            $cproducts = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                       
                            foreach ($cproducts as $cproduct){
                            
                                echo "<tr><td>". $cproduct['id']."</td><td>". $cproduct['name']."</td><td>". $cproduct['price']."</td></tr>";
                            }

                            $conn->close();
                        }
                        ?>
                    <tr>
                        <td><h4>Total Price<h4></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </body>
</html>