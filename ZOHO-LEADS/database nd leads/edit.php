
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit product data</title>
</head>

<body>
    <?php
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
      //   echo $id;
      //   $result = $crud -> getAttendeeDetails($id);
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "align";

      $conn = mysqli_connect($servername, $username, $password, $database);
      
      $sql = "SELECT * FROM `leads` WHERE lead_id=$id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      // print_r($row);


        $prod_id = $row ['lead_id'];
        $cust_id = $row['company'];
        $name = $row['first'];
        $qty = $row['last'];
        $mrp = $row['email'];
        $image = $row['phone'];
        $description = $row['lead'];
        $user_id = $row['zoho_id'];
      
    }
      

    
?>

<div class="container mb-1">
      <h1 class="text-center text-capitalize pt-2">Update Product Details</h1>
      <hr class="w-25 mx-auto pt-0">

      <div class="w-50 mx-auto">
        <form action="update.php" method="POST">
          <div class="form-group">
            <label for="fname">Lead Id:</label>
            <input type="text" class="form-control" placeholder="Enter Prod Id" id="fname" value="<?php echo $prod_id;?>" name="lead_id">
          </div>
          <div class="form-group">
            <label for="pwd">Company:</label>
            <input type="text" class="form-control" placeholder="Enter Cust Id" id="pwd" value="<?php echo $cust_id;?>" name="company">
          </div>
          <div class="form-group">
            <label for="pwd">First Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" id="pwd"value="<?php echo $name;?>" name="first">
          </div>
          <div class="form-group">
            <label for="pwd">Last Name:</label>
            <input type="text" class="form-control" placeholder="Enter Qty" id="pwd" value="<?php echo $qty;?>" name="last">
          </div>
          <div class="form-group">
            <label for="pwd">Email:</label>
            <input type="text" class="form-control" placeholder="Enter MRP" id="pwd" value="<?php echo $mrp;?>" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Phone:</label>
            <input type="text" class="form-control" placeholder="Enter Image" id="pwd" value="<?php echo $image;?>" name="phone">
          </div>
          <div class="form-group">
            <label for="pwd">Lead Source:</label>
            <input type="text" class="form-control" placeholder="Enter Description" id="pwd" value="<?php echo $description;?>" name="lead">
          </div>
          <div class="form-group">
            <label for="pwd">Zoho Id:</label>
            <input type="text" class="form-control" placeholder="Enter User Id" id="pwd" value="<?php echo $user_id;?>" name="zoho_id">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>

      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
   
</body>

</html>