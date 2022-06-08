<?php
include("access_token.php");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Leads?ids=330292000000296113',
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