<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.zohoapis.in/crm/v2/Leads?ids=330292000000296148',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Zoho-oauthtoken 1000.7e0eb8a115e85ca591432c4cb2355755.48872f97071f50d4dfe1fbcd2ef169f7',
    'Cookie: 34561a6e49=29f0bee6315f402bfb1c5dbae71ccfa7; 941ef25d4b=26e785490eba82a048fdbe4337cde743; JSESSIONID=B3B16DB505BA775CDF9B35007A2075C0; _zcsr_tmp=ba474496-7596-4b9a-b1c1-41cbe0b519a8; crmcsr=ba474496-7596-4b9a-b1c1-41cbe0b519a8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;