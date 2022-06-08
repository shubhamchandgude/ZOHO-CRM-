<?php
    include("db_connect.php");
     
	//this function will return access token from database
    // print_r(GenrateZohoAccessToken($conn));
	

	function GenrateZohoAccessToken($conn){

        $current_time = date("Y-m-d H:i:s");
		$getTokenSql="SELECT access_token,expiry_time FROM `zoho_access`";
	    $getTokenSqlRes=$conn->query($getTokenSql);
	    if($getTokenSqlRes->num_rows>0) {

            $getTokenSqlResData=mysqli_fetch_assoc($getTokenSqlRes);

            if(strtotime($current_time) < strtotime($getTokenSqlResData['expiry_time'])){
                return $token = "Zoho-oauthtoken".' '.$getTokenSqlResData['access_token']; 
            }else{
               return callForAccessToken($conn);
            }
	    }
	}	
	// this funtion will genrate new acces token and store into database
	function callForAccessToken($conn){

  	    $current_time = date("Y-m-d H:i:s");

        $getTokenSql="SELECT * FROM `zoho_access`";
        $getTokenSqlRes=$conn->query($getTokenSql);
        if($getTokenSqlRes->num_rows>0) {

            $getTokenData=mysqli_fetch_assoc($getTokenSqlRes);
            $url="https://accounts.zoho.in/oauth/v2/token?refresh_token=".$getTokenData['refresh_token']."&grant_type=".$getTokenData['grant_type']."&client_id=".$getTokenData['client_id']."&client_secret=".$getTokenData['client_secret']."&redirect_uri=".$getTokenData['redirect_uri']."&scope=".$getTokenData['scope'];
      
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_TIMEOUT,30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            $curlCallResponse = curl_exec($ch);
            $oauth2RefreshTokenResponse = json_decode($curlCallResponse,true);
            /*echo "<pre>";
            print_r($oauth2RefreshTokenResponse);*/

            if(isset($oauth2RefreshTokenResponse['access_token'])){
               $updateAccessToken="UPDATE `zoho_access` SET `access_token`='".$oauth2RefreshTokenResponse['access_token']."',`created_time`='".$current_time."',`expiry_time`='".date("Y-m-d H:i:s",strtotime('+1 hour',strtotime($current_time)))."' WHERE `Id`='1'";
               $updateAccessTokenRes=$conn->query($updateAccessToken);   
            }
            return "Zoho-oauthtoken".' '.$oauth2RefreshTokenResponse['access_token'];
            
        }
    }
?>