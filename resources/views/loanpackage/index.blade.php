@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Gói vay'],
    ]])

    @include('includes.option')

    <section class="wrap-loan-package">
        <div class="container">
            <div class="main-content loan-package">
                <h3 class="title">Hiện có {{ $data['total'] }} gói vay mua nhà</h3>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row list-package">
                            @foreach($data['data'] as $key => $item)
                                @if(!empty($item['bank']))
                                    <div class="item col-lg-4">
                                        <div class="item-loan {{ $item['bank']['logo_class_color'] }}">
                                            <div class="head">
                                                <img src="{{ $item['bank']['logo'] }}" alt="">
                                                <label class="checkbox ">
                                                    So sánh
                                                    <input class="checkbox-compare" type="checkbox" id="compare-{{ $item['id'] }}" name="" value="{{ $item['id'] }}"> <span></span>
                                                </label>
                                            </div>
                                            <div class="body">
                                                <p>{{ $item['title'] }}</p>
                                                <div class="box-loan">
                                                    <div class="percent">
                                                        Lãi suất <strong class="num">{{ $item['interest_per_year'] }}%</strong> {{ $item['preferential_time'] }} tháng
                                                    </div>
                                                    <div class="percent">
                                                        Ưu đãi <strong class="num">{{ $item['preferential_time'] }}</strong> tháng
                                                    </div>
                                                </div>
                                                <p class="hightlight"> <span>{{ $item['description'] }}</span></p>
                                                <a href="#">Yêu cầu tư vấn gói vay này</a>
                                                <a href="{{ route('goi-vay.chitiet', $item['id']) }}" class="detail">Xem chi tiết ></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <x-paginator-custom :data="$data"/>
                    </div>
                    <div class="col-md-3 no-padding-left">
                        <div class="wrap-box">
                            <livewire:form-caculate-loan-amount :allLoanPackage="$allLoanPackage" layout="layout2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('after_scripts')
    <script>
        //check session chua id goi vay
        let sessionIds = JSON.parse(sessionStorage.getItem('ids'));
        if (sessionIds) {
            $('.compare-group').addClass('active')
            $.each(sessionIds, function (key, value) {
                $('#append-div').find('.append-div-image').attr('src', value['image']);
                $('#append-div').find('.append-div-box').html( value['data1']);
                let div = $('.list-compare').find('.note').first().parent().parent();

                div.attr('id', 'subcompare-' + value['id']);
                $('.funcs-btn').append("<input type='hidden' id="+value['id']+" name='ids[]' value="+value['id']+" />")
                div.html( $('#append-div').html() );

                //checkbox with session
                $('#compare-' + value['id']).prop('checked', true);
            })
        }
    </script>
@endsection
