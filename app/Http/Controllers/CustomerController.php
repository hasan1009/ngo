<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Hash;
use Auth;
use Str;

class CustomerController extends Controller
{
    
    public function add()  {
        $data['header_title']="Customer List";
        return view('admin.customer.add', $data);
    }


        public function list()  {
            $data['header_title']="Customer List";
            $data['getRecord']=CustomerModel::getCustomer();
            return view('admin.customer.list', $data);
        }
        
        public function insert(Request $request)
        {
            $request->validate([
                'photo' => 'nullable|file|max:10240',
                'nidPhoto' => 'nullable|file|max:10240',
            ]);
        
            $user = auth()->user();
        
            // Check if the user has sufficient customer balance
            if ($user->customer_balance <= 0) {
                return redirect('admin/package/package')->with('error', 'Insufficient Customer adding balance. Please buy a package.');
            }
        
            $customer = new CustomerModel;
            $customer->banglaName = trim($request->banglaName);
            $customer->adminID = Auth::user()->adminID;
            $customer->name = trim($request->name);
            $customer->birthDay = trim($request->birthDay);
            $customer->f_name = trim($request->f_name);
            $customer->m_name = trim($request->m_name);
            $customer->mobile = trim($request->mobile);
            $customer->gender = trim($request->gender);
            $customer->nid = trim($request->nid);
            $customer->preAddress = trim($request->preAddress);
            $customer->perAddress = trim($request->perAddress);
            $customer->joiningDate = trim($request->joiningDate);
        
            // Handle photo upload
            if (!empty($request->file('photo'))) {
                $ext = $request->file('photo')->getClientOriginalExtension();
                $file = $request->file('photo');
                $randomStr = date('Ymdhis') . Str::random(20);
                $fileName = strtolower($randomStr) . '.' . $ext;
                $file->move('upload/customer/', $fileName);
                $customer->photo = $fileName;
            }
        
            // Handle NID photo upload
            if (!empty($request->file('nidPhoto'))) {
                $ext = $request->file('nidPhoto')->getClientOriginalExtension();
                $file = $request->file('nidPhoto');
                $randomStr = date('Ymdhis') . Str::random(20);
                $fileName = strtolower($randomStr) . '.' . $ext;
                $file->move('upload/nid/', $fileName);
                $customer->nidPhoto = $fileName;
            }
        
            // Save customer and update balance
            if ($customer->save()) {
                $user->customer_balance -= 1;
                $user->save();
        
                return redirect("admin/customer/list")->with('success', 'One customer successfully added.');
            } else {
                return redirect("admin/package/package")->with('error', 'Failed adding customer. Please try again.');
            }
        }
        


public function edit($id)  {

      
       
    $data['getRecord'] = CustomerModel::getSingle($id);

   
        $data['header_title']="Edit Customer";
        return view('admin.customer.edit', $data);

 
   
}

    public function editnominee($id)  {
        $data['getRecord'] = CustomerModel::getSingle($id);
        $data['header_title']="Edit Nominee";
        return view('admin.customer.editnominee', $data);

    
}


public function updateNominee($id, Request $request)  {

    $nominee= CustomerModel::getSingle($id);
    $nominee->nomineeName=trim($request->nomineeName);
    $nominee->nomineeFname=trim($request->nomineeFname);
    $nominee->nomineeMname=trim($request->nomineeMname);
    $nominee->nomineeMobile=trim($request->nomineeMobile);
    $nominee->nomineeRelation=trim($request->nomineeRelation);
    $nominee->nomineeFname=trim($request->nomineeFname);
    $nominee->nomineeGender=trim($request->nomineeGender);
    $nominee->nomineeAddress=trim($request->nomineeAddress);



if (!empty($request->file('nomineePhoto'))) {
    $file = $request->file('nomineePhoto');
    $randomStr = date('Ymdhis').Str::random(20);
    $filename = $randomStr . '.' . $file->getClientOriginalExtension();
    $file->move('upload/', $filename);
    $nominee->nomineePhoto = $filename;
}

if (!empty($request->file('nomineeNidPhoto'))) {
    $file = $request->file('nomineeNidPhoto');
    $randomStr = date('Ymdhis').Str::random(20);
    $filename = $randomStr . '.' . $file->getClientOriginalExtension();
    $file->move('upload/', $filename);
    $nominee->nomineeNidPhoto = $filename;
}

$nominee->save();
return redirect("admin/customer/details/" .$id)->with('succsess', 'Nominee succsessfully edited');
    
}


public function update($id, Request $request)  {

    
   $customer= CustomerModel::getSingle($id);
   
   $customer->banglaName = trim($request->banglaName);
   $customer->name = trim($request->name);
   $customer->birthDay = trim($request->birthDay);
   $customer->f_name = trim($request->f_name);
   $customer->m_name = trim($request->m_name);
   $customer->mobile = trim($request->mobile);
   $customer->gender = trim($request->gender);
   $customer->nid = trim($request->nid);
   $customer->preAddress = trim($request->preAddress);
   $customer->perAddress = trim($request->perAddress);
   $customer->joiningDate = trim($request->joiningDate);


if (!empty($request->file('photo'))) {
    $file = $request->file('photo');
    $randomStr = date('Ymdhis').Str::random(20);
    $filename = $randomStr . '.' . $file->getClientOriginalExtension();
    $file->move('upload/', $filename);
    $customer->photo = $filename;
}

   $customer->save();

   return redirect("admin/customer/details/" .$id)->with('succsess', 'Customer succsessfully edited');

    
}

public function details($id) {

    $data['getRecord']=CustomerModel::getSingle($id);
    $data['header_title']="Customer Details";
    return view('admin.customer.details', $data);

    
}


public function delete($id) {

    $customer= CustomerModel::getSingle($id);
    $customer->is_delete=1;
    $customer->save();
    return redirect("admin/customer/list")->with('succsess', 'Customer succsessfully deleted');
    
   }

   public function laser(){
    $data['header_title'] = "Customer Laser";
    $data['getRecord'] = CustomerModel::getLaser(); 
    return view('admin.customer.laser', $data);
}



public function report(Request $request)
{
    $data['header_title'] = "Collection Report";
    
    // Retrieve date filters from request
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $data['getRecord'] = TransactionModel::getReport($fromDate, $toDate);
    
    return view('admin.customer.report', $data);
}



            
 }
        
    

