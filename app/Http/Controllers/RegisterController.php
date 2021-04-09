<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function registerCustomer(Request $request) {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'password'    => 'required|min:6|confirmed',
            'password_confirmation' => ''
        ]);
        $result = ApiSetting::registerCustomer($data);
        if($result['status'] == 'fail') {
            $errors = collect($result['errors'])->map(function ($item, $key) {
                return collect($item)->first();
            });
            return back()->with('error_message_customer', collect($errors)->all());
        }
        return redirect()->route('authenticate.index');

    }
    public function registerAgent(Request $request) {
        $request->validate( [
            'fullname'     => 'required',
            'agent_email'    => 'required|email',
            'agent_phone'    => 'required',
            'agent_password'    => 'required|min:8|confirmed',
            'agent_name' => 'required',
            'employees_number' => 'required|numeric',
            'company_name' => 'required',
            'tax_code' => '',
            'address' => ''
        ]);
        $data = $request->all();
        $data['name'] = $data['agent_name'];
        $data['email'] = $data['agent_email'];
        $data['phone'] = $data['agent_phone'];
        $data['password'] = $data['agent_password'];
        $data['password_confirmation'] = $data['agent_password_confirmation'];
        unset($data['agent_name']);
        unset($data['agent_email']);
        unset($data['agent_phone']);
        unset($data['agent_password']);
        unset($data['agent_password_confirmation']);
        $result = ApiSetting::registerAgent($data);
        if($result['status'] == 'fail') {
            $errors = collect($result['errors'])->map(function ($item, $key) {
                return collect($item)->first();
            });
            return back()->with('error_message_agent', collect($errors)->all());
        }
        return redirect()->route('authenticate.index');
    }

    public function authenticateIndex() {
        return view('auth.authenticate');
    }
}
