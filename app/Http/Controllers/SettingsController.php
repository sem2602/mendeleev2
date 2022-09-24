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

        dd($settings);
    }
}
