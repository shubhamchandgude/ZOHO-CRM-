<?php

function generate_access_token(){
    $post = [
        'refresh_token'    => '1000.95b595ca051589c8e926cda8a64f1f7d.66e80d214c6b7f4338898895064ae92d',
        'client_id'        => '1000.U8R3XRYAAXSBAVL0HZ0ZYZX7XHDFLK',
        'client_secret'    => 'f4e6930540078fad601c2c8240841436bef401cb97',
        'grant_type'       => 'refresh_token'

    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.in/oauth/v2/token' );     
    curl_setopt($ch, CURLOPT_POST, 1 );     
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $post ) );   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );     
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded') );

    $response = curl_exec( $ch );
    $response = json_decode( $response );
    echo '<pre>';
    print_r($response);

}
generate_access_token();

?>