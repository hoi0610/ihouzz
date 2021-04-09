<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $data = [];
    protected $view = 'account';

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index(Request $request)
    {
        return view($this->view.'.change-password.index');
    }

    public function changePass(Request $request) {
        $data = $request->validate([
            'password_old' => 'required',
            'password'    => 'required|min:8|confirmed',
            'password_confirmation' => ''
        ]);
        $res = ApiSetting::changePassword($data);
        if(!empty($res['errors'])) {
            return back()->with('error_message', $res['errors']);
        } else {
            $this->guard()->logout();
            return redirect()->route('login')->with('change_password_success', 'Đổi mật khẩu thành công, vui lòng đăng nhập lại');
        }
    }

    public function saveFavoriteProduct(Request $request) {
        $res = ApiSetting::saveFavoriteProduct([
            'product_id' => $request->product_id
        ]);
        $this->guard()->updateSessionFavorite($res['data']);

        if($res['status'] == 'fail') {
            return back()->with('error_message_favorite', 'Lưu tin không thành công');
        } else {
            return back()->with('success_message_favorite', 'Lưu tin thành công');
        }
    }
    public function destroyFavoriteProduct(Request $request) {
        $res = ApiSetting::destroyFavoriteProduct([
            'product_id' => $request->product_id
        ]);
        $this->guard()->updateSessionFavorite($res['data']);

        if($res['status'] == 'fail') {
            return back()->with('error_message_favorite', 'Hủy lưu tin không thành công');
        } else {
            return back()->with('success_message_favorite', 'Hủy lưu tin thành công');
        }
    }

    protected function guard() {
        return Auth::guard('jwt');
    }
}
