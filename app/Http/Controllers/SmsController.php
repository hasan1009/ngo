<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    public function sms($id)  {
        $data['header_title']="SMS";
        $data['getRecord'] = CustomerModel::getSingle($id);
        return view('admin.sms.sms', $data);
    }

    public function sendSms(Request $request)
{
    $request->validate([
        'mobile' => 'required|numeric',
        'sms' => 'required|string|max:160',
    ]);

    $user = auth()->user();

    if ($user->sms_balance <= 0) {
        return redirect('admin/package/package')->with('error', 'Insufficient SMS balance. Please recharge to send SMS.');
    }

    $mobile = $request->input('mobile');
    $message = $request->input('sms');

    $apiUrl = "https://www.mohammadsojib.online/Free_sms/minhaz.php";

    $response = Http::timeout(60)->get($apiUrl, [
        'number' => $mobile,
        'message' => $message,
    ]);

    if ($response->successful()) {
        $user->sms_balance -= 1;
        $user->save();

        return redirect("admin/customer/list")->with('success', 'SMS sent successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to send SMS. Please try again.');
    }
}

}
