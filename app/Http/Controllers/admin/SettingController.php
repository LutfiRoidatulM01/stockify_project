<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        return view('pages.admin.pengaturan', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'app_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $settings = Setting::first() ?? new Setting();
        $settings->app_name = $request->app_name;
    
        if ($request->hasFile('app_logo')) {
            if ($settings->app_logo) {
                Storage::delete($settings->app_logo);
            }
    
            $path = $request->file('app_logo')->store('logos', 'public');
            $settings->app_logo = $path;
        }
    
        $settings->save();
    
        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
    
}
