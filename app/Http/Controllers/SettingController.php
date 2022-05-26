<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
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

        $setting->update($request->except('image', 'favicon', '_token'));
        if ($request->hasFile('logo')) {
            if (file_exists(public_path() . $setting->favicon)) {
                unlink(public_path() . $setting->favicon);
            }
            $file = $request->file('logo');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/' . $filename;
            $setting->update(['logo' => $path]);
        }
        if ($request->file('favicon')) {
            // dd(public_path() . $setting->favicon);
            if (file_exists(public_path() . $setting->favicon)) {
                unlink(public_path() . $setting->favicon);
            }
            $file = $request->file('favicon');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/' . $filename;
            $setting->update(['favicon' => $path]);
        }

        // dd($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
