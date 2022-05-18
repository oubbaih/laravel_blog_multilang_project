<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::all();;
        return view('dashboard.settings.index', compact('settings'));
    }
    public function update(Request $request, Setting $setting)
    {
        dd($request);

        return back();
    }
}
