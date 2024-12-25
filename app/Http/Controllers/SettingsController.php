<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsModel;
use Str;
class SettingsController extends Controller

{
    public function add()  {

        $data['header_title']="Settings";
        $data['getRecord']=SettingsModel::getSingle();
        return view('admin.settings.add', $data);
        
       }
    
       public function insert(Request $request)
{
    $settings = SettingsModel::getSingle();

    if ($request->file('logo')) {
        // Delete old logo if it exists
        if (!empty($settings->logo) && file_exists('upload/settings/' . $settings->logo)) {
            unlink('upload/settings/' . $settings->logo);
        }

        // Save new logo
        $ext = $request->file('logo')->getClientOriginalExtension();
        $file = $request->file('logo');
        $randomStr = date('Ymdhis') . Str::random(20);
        $logo = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/settings/', $logo);
        $settings->logo = $logo;
    }

    if ($request->file('favicon')) {
        // Delete old favicon if it exists
        if (!empty($settings->favicon) && file_exists('upload/settings/' . $settings->favicon)) {
            unlink('upload/settings/' . $settings->favicon);
        }

        // Save new favicon
        $ext = $request->file('favicon')->getClientOriginalExtension();
        $file = $request->file('favicon');
        $randomStr = date('Ymdhis') . Str::random(20);
        $favicon = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/settings/', $favicon);
        $settings->favicon = $favicon;
    }

    $settings->save();

    return redirect()->back()->with('success', 'Settings updated successfully');
}


    
       
}
