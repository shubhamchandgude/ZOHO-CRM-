<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome To Dashboard</title>
</head>

<body>
    <?php
          include("db_connect.php");
    ?>

    <div class="container mb-1">
        <h1 class="text-center text-capitalize pt-2">Insert Leads</h1>
        <hr class="w-25 mx-auto pt-0">

        <div class="w-50 mx-auto">
            <form action="integrate.php" method="post">
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" placeholder="Enter Company Name" id="company"
                        name="company">
                </div>
                <div class="form-group">
                    <label for="first">First Name</label>
                    <input type="text" class="form-control" placeholder="Enter First Name" id="first" name="first">
                </div>
                <div class="form-group">
                    <label for="last">Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter Last Name" id="last" name="last">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" placeholder="Enter Your Phone" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="lead">Lead Source</label>
                    <input type="text" class="form-control" placeholder="Enter Lead Source " id="lead" name="lead">
                </div>
                <button class="btn btn-primary" id="submit">Submit</button>
            </form>
         

            <?php
          include("access_token.php");
        // creating variables
          $company = $_POST['company'];
          $fname = $_POST['first'];
          $lname = $_POST['last'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $lsource = $_POST['lead'];
          $leadid = 'lead_id';
        
          
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Leads',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "data": [

                  {
                      "Company":'.$company.',
                      "Last_Name":'.$lname.',
                      "First_Name":'.$fname.',
                      "Email": '.$email.',
                      "Phone": '.$phone.',
                      "Lead_Source": '.$lsource.'
                 
                  }
              ],
              "trigger": [
                  "approval",
                  "workflow",
                  "blueprint"
              ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization:' . (GenrateZohoAccessToken($conn)),
              'Content-Type: application/json',
            ),
          ));
          
          $response = curl_exec($curl);
          
        //   curl_close($curl);
        //   echo $response;

    //  getting json id to variable
        $json = json_decode($response, true);
        $zoho_id = (int)$json['data'][0]['details']['id'];

         // insert data into phpmyadmin 
            $sql = "INSERT INTO `leads`(`company`, `first`, `last`, `email`, `phone`, `lead`, `zoho_id`, `lead_id`) VALUES ('$company','$fname','$lname','$email','$phone','$lsource', '$zoho_id', '$leadid')";

            if ($conn -> query($sql)==true)
                {
                  echo "";
                }
                else{
                    echo "ERROR";
                }
                $conn -> close();

            ?>

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