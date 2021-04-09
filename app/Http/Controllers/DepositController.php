<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    protected $data = [];
    protected $view = 'deposit';

    public function index()
    {
        return view($this->view.'.index',$this->data);
    }

    public function saveConsignment(Request $request) {
        $data = $request->validate([
            'type' => '',
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'product_type_id' => 'required',
            'product_category_id' => 'required',
            'price' => 'required|numeric|min:0|max:10000000000',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'address' => 'required',
            'home_images' => 'required|array|min:2',
            'drawing_images' => 'required|array|min:4',
            'description' => '',
            'other_needs' => '',
            'agree' => 'required',
        ],
            [
                'name.required' => 'Tên khách hàng không được để trống',
                'name.string' => 'Tên khách hàng phải là chữ',
                'phone.required' => 'Số điện thoại không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không không đúng định dạng',
                'product_type_id.required' => 'Loại hình giao dịch chưa được chọn',
                'product_category_id.required' => 'Loại bất động sản chưa được chọn',
                'price.required' => 'Giá đề nghị không được để trống',
                'price.numeric' => 'Giá đề nghị phải là kiểu số',
                'price.min' => 'Giá đề nghị tối thiểu là 0 đồng',
                'price.max' => 'Giá đề nghị tối đa là 99999999999999 đồng',
                'province_id.required' => 'Tỉnh/ Thành chưa được chọn',
                'district_id.required' => 'Quận/ Huyện chưa được chọn',
                'ward_id.required' => 'Phường/ Xã chưa được chọn',
                'address.required' => 'Địa chỉ không được để trống',
                'home_images.required' => 'Hình ảnh nhà chưa được tải lên',
                'home_images.min' => 'Hình ảnh nhà tải lên phải có tối thiểu 2 hình',
                'drawing_images.required' => 'Bản vẽ chưa được tải lên',
                'drawing_images.min' => 'Bản vẽ tải lên phải có tối thiểu 4 hình',
                'agree.required' => 'Bạn chưa đồng ý với điều khoản sử dụng và biểu phí giao dịch',
            ]
        );

        $data['home_images'] = collect($data['home_images'])->map( function ($item, $key) {
            return [
                'home_images[]', fopen($item, 'r')
            ];
        })->all();
        $data['drawing_images'] = collect($data['drawing_images'])->map( function ($item, $key) {
            return [
                'drawing_images[]', fopen($item, 'r')
            ];
        })->all();
        $res = ApiSetting::saveConsignment(collect($data)->except(['home_images', 'drawing_images'])->all(), array_merge($data['home_images'], $data['drawing_images']));

        if($res['status'] == 'fail') {
            $errors = collect($res['errors'])->map(function ($item, $key) {
                return collect($item)->first();
            });
            return back()->with('message_error', $errors);
        }
        return redirect('/');
    }
}
