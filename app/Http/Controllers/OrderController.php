<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Prom;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Settings;
use http\Env\Request;

class OrderController extends Controller
{

    public function createOrder()
    {
        return view('order_create', [
            'client' => null,
            'payments' => Payment::all()
        ]);
    }

    public function saveCreateOrder(Request $request)
    {
        dd($request);
    }

    public function acceptSite($order_id)
    {



        dd($order_id);
    }

    public function acceptProm($api_id, $order_id)
    {

        $api = Settings::findOrFail($api_id);
        $prom = new Prom($api->value);

        $order = $prom->getOrder($order_id);

        $client = Client::where('phone', $order['order']['phone'])->first();

        if(!$client){
            $client['firstname'] = $order['order']['client_first_name'];
            $client['lastname'] = $order['order']['client_last_name'];
        }

        $orderBlank = [
            'id' => $order['order']['id'],
            'setting_id' => $api_id,
            'client_first_name' => $client['firstname'],
            'client_last_name' => $client['lastname'],
            'email' => $order['order']['email'],
            'phone' => $order['order']['phone'],
            'price' => $order['order']['full_price'],
            'delivery_name' => $order['order']['delivery_option']['name'],
            'delivery_address' => $order['order']['delivery_address'],
            'payment_type' => $order['order']['payment_option']['name'],
            'payment' => false,
            'created' => date('d.m.Y h:i:s', strtotime($order['order']['date_created'])),
        ];

        if(!empty($order['order']['payment_data']['status']) && $order['order']['payment_data']['status'] == 'paid'){
            $orderBlank['payment'] = true;
        }

        $productsBlank = [];
        foreach ($order['order']['products'] as $key => $product){

            $product_id = explode('.', $product['sku']);
            $productInStore = Product::where('id', $product_id[0])->first();

            //dd($productInStore);

            if($productInStore){

                $productsBlank[$key] = [
                    'id' => $productInStore->id,
                    'prom_id' => $product['id'],
                    'name' => $product['name_multilang']['uk'],
                    'price' => $productInStore->price,
                    'quantity' => $product['quantity'],
                    'is_store' => $productInStore->quantity,
                ];

                if($productInStore->quantity - $product['quantity'] < 0){
                    $productsBlank[$key]['error'] = 'Недостатьня кількість товару на складі!';
                    //$order['order']['products'][$key]['available'] = true;
                }

            }

            //dd($product);

            if(!$productInStore){
                $productsBlank[$key]['not_found'] = $product['name_multilang']['uk'];
            }

        }

        $orderBlank['products'] = $productsBlank;

        //dd($orderBlank);

        return view('accept_prom', [
            'order_title' => $api->setting_name,
            'order' => $orderBlank,
            'payments' => Payment::all()
        ]);




    }

}
