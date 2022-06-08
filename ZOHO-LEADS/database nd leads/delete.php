<?php
// Delete from ZOHO CRM LEADS
include("db_connect.php");
$sql = "SELECT * FROM `leads`";
$result = mysqli_query($conn, $sql);



 while($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['zoho_id'];
    // echo $user_id;
    

 }

include("access_token.php");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Leads?ids='.$user_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Authorization:'. (GenrateZohoAccessToken($conn)),
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



// Delete from database 
include("db_connect.php");

$id = $_GET['id'];

$deletequery = "DELETE FROM `leads` WHERE lead_id=$id";

$query = mysqli_query($conn, $deletequery);


if($deletequery){

?>

<script>
    alert('Deleted Successfull');
</script>

    <?php

}else{

    ?>
    <script>
    alert('Not Deleted');
    </script>

    <?php
}
$delete = mysqli_query($conn, $deletequery);
if($delete){
    header("Location: db_leads.php");

}

?>