<?php

$lead_id = $_POST['lead_id'];
$company = $_POST['company'];
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$lead = $_POST['lead'];
$zoho_id = $_POST['zoho_id'];


// UPDATE IN ZOHO CRM LEADS 

include("access_token.php");
// trying to find id in variable 
// echo $zoho_id;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Leads/'.$zoho_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "data": [
        {
          "Company":'.$company.',
          "Last_Name":'.$last.',
          "First_Name":'.$first.',
          "Email": '.$email.',
          "Phone": '.$phone.',
          "Lead_Source": '.$lead.'
        },
    ]
}

',
  CURLOPT_HTTPHEADER => array(
    'Authorization:' . (GenrateZohoAccessToken($conn)),
    'Content-Type: application/json',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



// UPDATE IN DATABASE
// print_r($_POST);

// $lead_id = $_POST['lead_id'];
// $company = $_POST['company'];
// $first = $_POST['first'];
// $last = $_POST['last'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $lead = $_POST['lead'];
// $zoho_id = $_POST['zoho_id'];



$servername = "localhost";
$username = "root";
$password = "";
$database = "align";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "UPDATE `leads` SET `lead_id`='$lead_id',`company`='$company',`first`='$first',`last`='$last',`email`='$email',`phone`='$phone',`lead`='$lead',`zoho_id`='$zoho_id' WHERE  lead_id=$lead_id";

echo $sql;
$update = mysqli_query($conn, $sql);
if($update){
    header("Location: db_leads.php");

}

?>