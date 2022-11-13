<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $settings = Settings::all();

        return view('settings', [
            'settings' => $settings,
            'services' => $services
        ]);

    }

    public function insert(Request $request)
    {

        $data = $request->validate([
            'service' => ['required', 'numeric'],
            'key' => ['required'],
            'value' => ['required'],
        ]);

        $settings = new Settings;

        $settings->service_id = $data['service'];
        $settings->key = $data['key'];
        $settings->value = $data['value'];
        $settings->setting_name = $request->name;
        $settings->save();

        return redirect()->route('settings');
    }
}
