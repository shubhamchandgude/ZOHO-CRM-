
<?php
include("access_token.php");

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
            "Company": "anuja.ltd",
            "Last_Name": "Chandgude",
            "First_Name": "Shubham",
            "Email": "patil.ltd@gmail.com",
            "Phone": "5555-6666-7777",
            "Lead_Source": "Online Stores"
        },
        {
            "Company": "Test.Ltd",
            "Last_Name": "Pawar",
            "First_Name": "Vishal",
            "Email": "test.ltd@villa.com",
            "Phone": "5555-6666-7777",
            "Lead_Source": "Advertisement"
            
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