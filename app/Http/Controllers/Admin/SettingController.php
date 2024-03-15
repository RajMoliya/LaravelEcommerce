<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view("admin.settings.index",compact('setting'));
    }

    public function store(Request $request){
        $setting = Setting::first();
        if($setting){
            if ($request->hasFile('logo')) {

                $path = 'uploads/logo/' . $setting->logo;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/logo/', $filename);
                $setting->update([
                    'logo' => $filename,
                ]);
            }
            if($request->picker_color){
                $setting->update([
                'theme_color' => $request->picker_color,
            ]);}
            if($request->text_color){
                $setting->update([
                'theme_color' => $request->text_color,
            ]);
            }
            $setting->update([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'map' => $request->map,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube
            ]);
            return redirect()->back()->with('message','Settings Udated Successfully');

        }else{
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/logo/', $filename);
            Setting::create([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'theme_color' => $request->theme_color,
                'logo' => $filename,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'map' => $request->map,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube
            ]);
            return redirect()->back()->with('message','Settings Created');
        }
    }
}
