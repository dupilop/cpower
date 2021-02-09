<?php

function sendmessage($tokken, $to, $message)
{
    $args = http_build_query(array(
        'auth_token' => $tokken,
        'from'  => '31001',
        'to'    => $to,
        'text'  => $message
    ));
    $url = "http://aakashsms.com/admin/public/sms/v1/send/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1); ///
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Response
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
}
