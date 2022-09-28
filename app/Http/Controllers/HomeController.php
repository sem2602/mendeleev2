<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {

        $AllOrders = [];

        $promApis = Settings::where('service_id', 2)->get();

        // Prom Orders
        foreach ($promApis as $api){

            $prom = new Services\Prom($api->value);

            $PromOrders = $prom->getPendingOrders();

            if(!empty($PromOrders['orders'])){
                foreach ($PromOrders['orders'] as $order){
                    $order['api_id'] = $api->id;
                    $AllOrders[] = $order;
                }
            }

        }
        //////////////////////////////////////////////////////



        echo '<pre>';
        var_dump($AllOrders);
        exit;



        return view('home', [
            'orders' => $AllOrders
        ]);
    }

}
