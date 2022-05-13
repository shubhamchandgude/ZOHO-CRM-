
<?php

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
            "Company": "patil.ltd",
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
    'Authorization: Zoho-oauthtoken 1000.bbe623bf7c1440e79e96eb703aea1e84.97637eda396ff9bbf19388ae6497c3b4',
    'Content-Type: application/json',
    'Cookie: 34561a6e49=29f0bee6315f402bfb1c5dbae71ccfa7; 941ef25d4b=26e785490eba82a048fdbe4337cde743; JSESSIONID=0FCF439304EB53C4B1037C8ED71F3C81; _zcsr_tmp=ba474496-7596-4b9a-b1c1-41cbe0b519a8; crmcsr=ba474496-7596-4b9a-b1c1-41cbe0b519a8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;