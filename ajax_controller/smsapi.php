<?php
// Simple SMS send function
$key = 'EASY5f2285cb848a05.39824458';
// function sendSMS($key, $to, $message, $originator)
// {
//     $URL = "https://easysms.gr/api/sms/send?key=" . $key . "&to=" . $to;
//     $URL .= "&text=" . urlencode($message) . '&from=' . urlencode($originator);
//     $fp = fopen($URL, 'r');
//     return fread($fp, 1024);
// }
// // Example of use 
// $response = sendSMS($key, '9815447278', 'My test message', ' 056592366');
// echo $response;


$endpoint = 'https://easysms.gr/api/sms/send';

$parameters = array(
    'key'     => 'EASY5f2285cb848a05.39824458',
    'text'    => 'Your message',
    'from'    => 'sender',
    'to'      => '9815447278',
    'type'    => 'json' // type of return format
);
function call_endpoint($endpoint, $parameters)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $endpoint);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $output =  curl_exec($c);
    curl_close($c);
    return $output;
}

$json = json_decode(call_endpoint($endpoint, $parameters), true);

echo '<pre>';
print_r($json);
