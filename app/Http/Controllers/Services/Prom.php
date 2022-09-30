<?php

namespace App\Http\Controllers\Services;


define('HOST', 'my.prom.ua');  // e.g.: my.prom.ua, my.tiu.ru, my.satu.kz, my.deal.by, my.prom.md

class Prom {

    function __construct($token) {
        $this->token = $token;
    }

    function make_request($method, $url, $body) {

        $url = 'https://' . HOST . $url;

        $headers = array (
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if (strtoupper($method) == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        }

        if (!empty($body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    function getPendingOrders(){

        $url = '/api/v1/orders/list?status=pending';
        $method = 'GET';
        return $this->make_request($method, $url, NULL);

    }

    function paymentOptions(){

        $url = '/api/v1/payment_options/list';
        $method = 'GET';
        return $this->make_request($method, $url, NULL);

    }

    function getProductById($product_id) {
        $url = '/api/v1/products/'.$product_id;
        $method = 'GET';
        return $this->make_request($method, $url, NULL);
    }

    function setProductById($product_id, $quantity, $price = null) {
        $url = '/api/v1/products/edit';
        $method = 'POST';
        $data = [
            'id'=> $product_id,
            'quantity_in_stock'=> $quantity
        ];
        if($price){
            $data['price'] = $price;
        }
        $body = [$data];
        return $this->make_request($method, $url, $body);
    }

    function setProductsByIds($body) {
        $url = '/api/v1/products/edit';
        $method = 'POST';
        return $this->make_request($method, $url, $body);
    }

}
