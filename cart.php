<!DOCTYPEhtml>
<html lang="en">
    <head>
    <title>Bootstrap Example</title>
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

                        $sql = 'SELECT * FROM cart';
                       
                        $result = mysqli_query($conn,$sql);
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>". $row['id']."</td><td>". $row['name']."</td><td>". $row['price']."</td></tr>";
                        }

                        $conn->close();
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