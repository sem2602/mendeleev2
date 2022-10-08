<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Prom;
use App\Models\Settings;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function acceptSite($order_id)
    {



        dd($order_id);
    }

    public function acceptProm($api_id, $order_id)
    {
        $api = Settings::findOrFail($api_id);

        //dd($api);

        $prom = new Prom($api->value);

        $order = $prom->getOrder($order_id);

        return view('accept_prom', [
            'order_title' => $api->setting_name,
            'order' => $order['order']
        ]);

        //dd($order);


    }

}
