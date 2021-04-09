@php
    $customer_manage_account = \App\Facade\ApiSetting::listMenuItem(['position' => 'customer-manage-account', 'locale' => 'vi', 're_cache' => 1])['data'];
    $customer = \App\Facade\ApiSetting::infoCustomer()['data']['customer'];
@endphp
<div class="box box-left-account">
    <div class="top-account-info">
        <div class="image-upload">
            <label for="file-input">
                <img class="account" id="blah1" src="{{$customer['avatar'] ?? '/html/assets/images/account.png'}}" alt="your image">
                <div class="wrap-bg" >
                    <img class="display " src="/html/assets/images/icons/photo-camera.png" alt="your image">
                </div>
                <input id="file-input" type="file" onchange="readURL(this);" >
            </label>
        </div>

        <div class="info-text">
            <strong class="name">{{$customer['name'] ?? ''}}</strong>
            <p>{{$customer['type'] ?? ''}}</p>
            <p>Thành viên từ {{old('created_at', output_date($customer['created_at'] ?? ''))}}</p>
        </div>
    </div>

    <div class="bottom-account">
        <ul class="list-action-account">
            @if(!empty($customer_manage_account))
                @foreach($customer_manage_account as $item)
                    <li class="">
                        <a href="{{ url($item['link']) }}">
                            <span class="icon" style="display: inline-block; width: 20px; height: 20px"><i class="{{ $item['class'] ?? '' }}"></i></span> <span class="text">{{ $item['name'] ?? '' }}</span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
