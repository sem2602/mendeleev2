<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {

        $AllOrders = [];

        // Prom Orders
        $promApis = Settings::where('service_id', 2)->get();
        foreach ($promApis as $api){

            $prom = new Services\Prom($api->value);

            $promOrders = $prom->getPendingOrders();

            if(!empty($promOrders['orders'])){
                foreach ($promOrders['orders'] as $order){
                    $order['api_id'] = $api->id;
                    $order['service_name'] = $api->setting_name;
                    $AllOrders[] = $this->convertPromOrder($order);
                }
            }

        }

        // Opencart orders
        $opencartApi = Settings::where('service_id', 1)->get();
        foreach ($opencartApi as $api){
            $opencart = new Services\Opencart($api->value);

            $opencartOrders = $opencart->getPendingOrders();

//            dd($opencartOrders);

            if(!empty($opencartOrders)){
                foreach ($opencartOrders as $order){
                    $order['api_id'] = $api->id;
                    $order['service_name'] = $api->setting_name;
                    $AllOrders[] = $this->convertOpencartOrder($order);
                }
            }

        }

        return view('home', ['orders' => $AllOrders]);

    }

    private function convertPromOrder($order){

        $blank = [
            'id' => $order['id'],
            'service_id' => 2,
            'service_name' => $order['service_name'],
            'api_id' => $order['api_id'],
            'client_first_name' => $order['client_first_name'],
            'client_last_name' => $order['client_last_name'],
            'email' => $order['email'],
            'phone' => $order['phone'],
            'price' => $order['full_price'],
            'payment_type' => $order['payment_option']['name'],
            'payment' => false,
            'created' => date('d.m.Y h:i:s', strtotime($order['date_created'])),
        ];

        if(!empty($order['payment_data']['status']) && $order['payment_data']['status'] == 'paid'){
            $blank['payment'] = true;
        }

        return $blank;

    }

    private function convertOpencartOrder($order){

        $paymentType = explode(' ', $order['payment_method']);

        $blank = [
            'id' => $order['order_id'],
            'service_id' => 1,
            'service_name' => $order['service_name'],
            'api_id' => $order['api_id'],
            'client_first_name' => $order['firstname'],
            'client_last_name' => $order['lastname'],
            'email' => $order['email'],
            'phone' => $order['telephone'],
            'price' => (float)$order['total'] . ' грн',
            'payment_type' => $paymentType[0] . ' ' . $paymentType[1],
            'payment' => false,
            'created' => date('d.m.Y h:i:s', strtotime($order['date_added'])),
        ];

        return $blank;

    }

}
