<?php


namespace App\Http\Controllers\Services;


class NovaPoshta
{

    private string $urlApi = "https://api.novaposhta.ua/v2.0/json/";
    private string $urlPrint = "https://my.novaposhta.ua/";
    private string $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    public function searchCity($city): array
    {
        return $this->sendQuery('Address', 'searchSettlements', [
            "CityName" => $city,
            "Limit" => "10",
            "Page" => "1"
        ]);
    }




    public function sendQuery($modelName, $calledMethod, $methodProperties = null): array
    {

        $data["apiKey"] = $this->apiKey;
        $data["modelName"] = $modelName;
        $data["calledMethod"] = $calledMethod;
        if($methodProperties){
            $data['methodProperties'] = $methodProperties;
        }

        $post = json_encode($data);
        $result = $this->send($this->urlApi, "POST", $post);
        return json_decode($result, true);

    }

    private function send($url, $type, $data = []): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if($type == "POST"){
            curl_setopt($ch, CURLOPT_POST, 1);
        }else if($type == "GET"){
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if($type == "POST"){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}
