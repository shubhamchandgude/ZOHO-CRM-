<?php

function generate_refresh_token(){
    $post = [
        'code'             => '1000.325ae335e5dfdea5442b1112983ca12c.6532d25d096d3408ce5867a54f5fd664',
        'redirect_uri'     => 'http://example.com/callbackurl',
        'client_id'        => '1000.U8R3XRYAAXSBAVL0HZ0ZYZX7XHDFLK',
        'client_secret'    => 'f4e6930540078fad601c2c8240841436bef401cb97',
        'grant_type'       => 'authorization_code'

    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.in/oauth/v2/token' );     
    curl_setopt($ch, CURLOPT_POST, 1 );     
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $post ) );   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );     
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
    ) );

    $response = curl_exec( $ch );
    // $response = json_encode( $response );
    echo '<pre>';
    print_r($response);

}
generate_refresh_token();

?>