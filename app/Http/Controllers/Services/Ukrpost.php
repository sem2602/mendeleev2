<?php


namespace App\Http\Controllers\Services;


class Ukrpost
{

    public string $url = 'https://dev.ukrposhta.ua/ecom/0.0.1/'; // TEST

    private string $bearer;
    private string $token;

    function __construct($bearer = '', $token= ''){

        $this->bearer = $bearer;
        $this->token = $token;

    }

    // Получить массив данных городов по имени
    public function getCitiesLikeName($name){
        $url = 'https://delivery.evo.company/ukrposhta/cities_with_real_ids?city_name=' . urlencode($name) . '&language=uk';
        return $this->send($url);
    }

    // Получить данные города по city_id
    public function getDepByCityRef($ref){
        $url = 'https://delivery.evo.company/ukrposhta/warehouses?city_id=' . $ref . '&language=uk';
        return $this->send($url);
    }



    private function send($url, $body = NULL){

        $header = array('Accept: application/json', 'Content-Type: application/json', "Authorization: Bearer " . $this->bearer);
        $ch = curl_init();

        if($body){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_ENCODING , "gzip");
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output,true);
    }

}
