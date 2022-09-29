<?php

namespace App\Http\Controllers\Services;

define('HOST', 'https://panel.mendeleevmarket.com/api/');

class Opencart
{

    function __construct($token) {
        $this->token = $token;
    }

    function make_request($method, $url, $body) {
        $headers = array (
            'Authorization:' . $this->token
        );

        $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'https://' . HOST . $url);
        curl_setopt($ch, CURLOPT_URL, HOST . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if (strtoupper($method) == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        }

        if (!empty($body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // TIMEOUT RESPONSE
        // curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 6);
        // curl_setopt ($ch, CURLOPT_TIMEOUT, 6);
        ////////////////////////////////////////////////////

        $result = curl_exec($ch);

        curl_close($ch);

        //return $result;

        return json_decode($result, true);
    }

    function getPendingOrders() {
        $url = 'orders';

        $method = 'GET';

        $response = $this->make_request($method, $url, NULL);

        return $response;
    }

}
