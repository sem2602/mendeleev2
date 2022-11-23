<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Prom;
use App\Models\Client;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceptPromController extends Controller
{

    public function __invoke(Request $request)
    {
        $api = Settings::find($request->setting_id)->value;



        $prom = new Prom($api);

        $order = $prom->getOrder($request->order_id);

        $client = Client::where('phone', $order['order']['phone'])->first();

        //dd($client);



        //DB::beginTransaction();

        if (!$client){
            $client = Client::create([
                'firstname' => $order['order']['client_first_name'],
                'lastname' => $order['order']['client_last_name'],
                'middlename' => $order['order']['client_second_name'],
                'email' => $order['order']['email'],
                'phone' => $order['order']['phone'],
            ]);


        }

        //dd($client->id);


        //$status = $prom->setOrderStatus($request->order_id, 'pending');

        //dd($status);
    }
}
