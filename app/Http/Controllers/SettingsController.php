<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();

        return view('settings', [
            'settings' => $settings
        ]);

    }

    public function insert(Request $request)
    {
        $settings = new Settings;

        $settings->service_name = $request->service_name;
        $settings->data = $request->key;
        $settings->save();

        return redirect()->route('settings');
    }
}
