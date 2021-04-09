<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;

class RegisterAdvisoryController extends Controller
{
    public function registerAdvisory(Request $request) {
        $blockId = $request->blockId;
        $data = $request->validate([
            'name_'.$blockId => 'required',
            'phone_'.$blockId => 'required',
            'email_'.$blockId => 'required|email',
        ],[
            'name_'.$blockId.'.required' => 'Trường name không được bỏ trống',
            'phone_'.$blockId.'.required' => 'Trường phone không được bỏ trống',
            'email_'.$blockId.'.required' => 'Trường email không được bỏ trống',
            'email_'.$blockId.'.email' => 'Trường email không đúng định dạng',
        ]);
        $params['name'] = $data['name_'.$blockId];
        $params['email'] = $data['email_'.$blockId];
        $params['phone'] = $data['phone_'.$blockId];
        $params['product_id'] = $request->has('product_id') ? $request->product_id : null;
        $params['project_id'] = $request->has('project_id') ? $request->project_id : null;
        $res = ApiSetting::registerAdvisory($params);
        if($res['status'] == 'fail') {
            return back()->with('error_message', $res['errors'])->withInput();
        } else {
            return back()->with('success_message', 'Đăng ký tư vấn thành công');
        }

    }
    public function registerHomeView(Request $request) {
        $blockId = $request->blockId;
        $data = $request->validate([
            'customer_name_'.$blockId => 'required',
            'customer_phone_'.$blockId => 'required',
            'customer_email_'.$blockId => 'required|email',
            'time_start_'.$blockId => 'required|date',
        ],
            [
                'customer_name_'.$blockId.'.required' => 'Trường name không được bỏ trống',
                'customer_phone_'.$blockId.'.required' => 'Trường phone không được bỏ trống',
                'customer_email_'.$blockId.'.required' => 'Trường email không được bỏ trống',
                'customer_email_'.$blockId.'.email' => 'Trường email không đúng định dạng',
                'time_start_'.$blockId.'.required' => 'Trường thời gian không được bỏ trống',
                'time_start_'.$blockId.'.date' => 'Trường thời gian không đúng định dạng',
            ]);
        $params['name'] = $data['customer_name_'.$blockId];
        $params['phone'] = $data['customer_phone_'.$blockId];
        $params['email'] = $data['customer_email_'.$blockId];
        $params['time_start'] = $data['time_start_'.$blockId];
        $params['product_id'] = $request->has('product_id') ? $request->product_id : null;
        $params['project_id'] = $request->has('project_id') ? $request->project_id : null;
        $res = ApiSetting::registerHomView($params);
        if($res['status'] == 'fail') {
            return back()->with('error_message', $res['errors'])->withInput();
        } else {
            return back()->with('success_message', 'Đăng ký xem nhà thành công');
        }

    }
}
