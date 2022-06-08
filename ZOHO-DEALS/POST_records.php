
<?php
include("access_token.php");


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Deals',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'
{
    "data": [
        {
          "Deal_Name": "silvershine deal",
          "Amount": "300000",
          "Stage": "Education",
          "Closing_Date": "2022-05-26",
          "Account_Name": "Mohan pehar",
          "Contact_Name": {
            "name": "Kris Marrier (Sample)",
            "id": "330292000000231259"
          }
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

curl_close($curl);
echo $response;