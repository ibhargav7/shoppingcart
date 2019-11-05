<html>
<head>
<title>sign in </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body style="background-color:#007bffd1;padding-top:60px;padding-bottom:60px">


<div class="card" style="width: 25rem;margin:auto">
  <div class="card-body">
      <h1 class="card-title" style="text-align:center" >Sign Up</h1><br>

      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
method="POST">
  
    
    
        <div class="form-group">
          <label for ="t1">Name :</label>
          <input type='text' id='name' class="form-control"  name= 'name' "required maxlength" = "40" required>
          </div>
          <div class="form-group">
          <label for="t2">Email </label>
          <input type='email' id = 'email'class="form-control" name= 'email'  "required maxlength" = "40" required>
          
          </div>
          <div class="form-group">
          
          <label for="t5">Password :</label>
          

          <input type='password' class="form-control" id ='password' name='password'required >
          </div>
          <div class="form-group">
          <label for="t6">Confirm password :</label>
          
          <input type='password' class="form-control" id ='passwordc' name='passwordc' required>
          </div>
          <div class="form-group">
          <label for="t3">Phone no. :</label>
          <input type='text' id ='phoneno' name='phoneno'class="form-control"  "required maxlength" = "15" required>
          </div>
          <div class="form-group">
          <label for="t4">Country :</label>
          <input type='text' id='country'class="form-control" name='country'  "required maxlength" = "40" required>
          </div>
  
          <input type="submit" id="submit" value="submit"class="btn btn-primary" ><br><br>
          <div>
          <p>Already a user? then:</p>
          <a href="http://localhost/shoppingcart/login" >Login In</a>
          </div>
        </div>
          
      </form>
    
  </div>
</div>
<?php 
    $name=$email=$password=$phoneno=$country="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name=test($_POST["name"]);
        $email=test($_POST["email"]);
        $password=test($_POST["password"]);
        $cpassword=test($_POST["passwordc"]);
        $phoneno=test($_POST["phoneno"]);
        $country=test($_POST["country"]);
        
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
        $sql1 ="SELECT  `email` FROM `login` WHERE email='".$email."'";
        echo "$sql1";
        $result1 = mysqli_query($conn,$sql1);
        if (mysqli_num_rows($result) == 0) {
            $sql="INSERT INTO `login`(`name`, `email`, `password`, `phoneno`) VALUES ('".$name."','".$email."','".$password."','".$phoneno."')";
            echo "$sql";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("error");
            }
            
            
            
        }
        
        else{
            echo "email is already registered!";
        }
        
       
    
    
   
?>
</body>
</html>