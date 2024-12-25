<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageModel;
use App\Models\SmsModel;



class PackageController extends Controller
{
   

    public function add()  {
        
        $data['header_title']="Add Package";
        return view('admin.package.add', $data);
    }

    public function list()  {
        
        $data['getRecord']=PackageModel::getPackages();
        $data['header_title']="Packages";
        return view('admin.package.list', $data);
    }

    public function package()  {
        
        $data['getRecord']=PackageModel::getPackages();
        $data['header_title']="Packages";
        return view('admin.package.package', $data);
    }

    public function insert(Request $request)
    {
        
           $package = new PackageModel;
           $package->name=trim($request->name);
           $package->customer=trim($request->customer);
           $package->duration=trim($request->duration);
           $package->sms=trim($request->sms);
           $package->price=trim($request->price);
           $package->is_delete=0;
        
           $package->save();
    
        
    
          return redirect('admin/package/list')->with('succsess', 'Package added successfully');
    }

    public function edit($id)
    {
        
        $data['getRecord'] = PackageModel::getSingle($id);

        $data['header_title']="Edit Package";
        return view('admin.package.edit', $data);
    }

    public function update($id, Request $request) {

        $package= PackageModel::getSingle($id);
        $package->name=trim($request->name);
        $package->customer=trim($request->customer);
        $package->duration=trim($request->duration);
        $package->sms=trim($request->sms);
        $package->price=trim($request->price);
        $package->is_delete=0;
        $package->save();

        return redirect('admin/package/list')->with('succsess', 'Package successfully updated');

        
     }

     public function delete($id) {

        $package= PackageModel::getSingle($id);
        $package->is_delete=1;
        $package->save();
        return redirect("admin/package/list")->with('succsess', 'Package succsessfully deleted');
    
    
        
       }
      
       public function checkout($id)
       {
           
           $data['getRecord'] = PackageModel::getSingle($id);
           $data['header_title']="Checkout";
           return view('admin.package.checkout', $data);
       }


       public function sms_package()  {
        $data['getRecord']=SmsModel::getSmsPackages();
        $data['header_title']="SMS Package";
        return view('admin.package.sms_package', $data);
    }

    public function add_sms()  {
        
        $data['header_title']="Add SMS Package";
        return view('admin.sms_package.add_sms', $data);
    }


    public function insert_sms(Request $request)
    {
        
           $package = new SmsModel;
           $package->name=trim($request->name);
           $package->price=trim($request->price);
           $package->number=trim($request->number);
           $package->rate=trim($request->rate);
           $package->is_delete=0;
           $package->save();
          return redirect('admin/sms_package/list_sms')->with('succsess', 'SMS Package added successfully');
    }

    public function list_sms()  {
        
        $data['getRecord']=SmsModel::getSmsPackages();
        $data['header_title']="SMS Packages";
        return view('admin.sms_package.list_sms', $data);
    }


    public function edit_sms($id)
    {
        
        $data['getRecord'] = SmsModel::getSingle($id);

        $data['header_title']="Edit SMS Package";
        return view('admin.sms_package.edit_sms', $data);
    }

    public function update_sms($id, Request $request) {

        $package= SmsModel::getSingle($id);
        $package->name=trim($request->name);
        $package->price=trim($request->price);
        $package->number=trim($request->number);
        $package->rate=trim($request->rate);
        $package->save();

        return redirect('admin/sms_package/list_sms')->with('succsess', 'Package successfully updated');

        
     }

    
     public function delete_sms($id) {

        $package= SmsModel::getSingle($id);
        $package->is_delete=1;
        $package->save();
        return redirect("admin/sms_package/list_sms")->with('succsess', 'Package succsessfully deleted');
    
    
        
       }
    
       

}
