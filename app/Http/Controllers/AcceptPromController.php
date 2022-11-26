<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Prom;
use App\Models\Client;
use App\Models\DeliveryProvider;
use App\Models\Order;
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
        $delivery_provider_id = DeliveryProvider::where('name', $order['order']['delivery_provider_data']['provider'])->first()->id;

        if (!$client){
            $client = Client::create([
                'firstname' => $order['order']['client_first_name'],
                'lastname' => $order['order']['client_last_name'],
                'middlename' => $order['order']['client_second_name'],
                'email' => $order['order']['email'],
                'phone' => $order['order']['phone'],
            ]);
        }

        DB::beginTransaction();

        $createdOrder = Order::create([
            'ext_id' => $order['order']['id'],
            'setting_id' => $request->setting_id,
            'client_id' => $client->id,
            'delivery_provider_id' => $delivery_provider_id,
            'delivery_provider_ext' => $order['order']['delivery_option']['id'],
            'sender_id' => 1,
            'recipient_city_ref' => $order['order']['delivery_provider_data']['recipient_warehouse_id'],
            'recipient_address' => $order['order']['delivery_address'],
            'warehouse_type' => $order['order']['delivery_provider_data']['type'],
            'payment' => $order['order']['payment_option']['name'],
            'total' => (float)str_replace(",",".", preg_replace("/[^,.0-9]/","",$order['order']['full_price'])),
            'status_id' => 1,
            'user_id' => auth()->user()->id,
        ]);


        //$status = $prom->setOrderStatus($request->order_id, 'pending');
        $status = 1;

        if(isset($status['error'])){
            DB::rollBack();
            return to_route('order.accept.prom', ['api_id' => $request->setting_id, 'order_id' => $order['order']['id']]);
        }

        DB::commit();

        dd($status);

        return to_route('/home');
    }
}
