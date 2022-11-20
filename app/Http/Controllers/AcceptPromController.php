<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Prom;
use App\Models\Settings;
use Illuminate\Http\Request;

class AcceptPromController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $api = Settings::find($request->setting_id)->value;

        //dd($api);

        $prom = new Prom($api);

        $status = $prom->setOrderStatus($request->order_id, 'pending');

        dd($status);
    }
}
