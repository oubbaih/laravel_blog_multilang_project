<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.settings.index');
    }
    public function update(Request $request, Setting $setting)
    {
        $data = [
            'logo' => 'nullable|image|mimes:jpg,png,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'instagram' => 'nullable|string',
            'gmail' => 'nullable|email',
            'youtube' => 'nullable|string',
        ];

        foreach (config('app.languages') as $key => $value) {
            $data[$key . '*.title'] = 'nullable | string';
            $data[$key . '*.content'] = 'nullable | string';
        };
        $request->validate($data);
        $setting::where('id', 1)->update($request->except('logo', 'favicon'));
        return back();
    }
}
