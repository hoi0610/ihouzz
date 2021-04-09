@extends('booking::layouts.main',
['header_account' => 1,'has_header_account' => 1,'title_page' => 'Thông báo'])

@section('content')
    <main>
        <section class="content-notification">
            <div class="header-camnang">
                <div class="container">
                    <p class="title"><a href="{{route('notification.index')}}">
                            <i class="fas fa-chevron-left"></i></a> {{$object['object_display_name']}}</p>
                </div>
            </div>
            <div class="content">
                <div class="container">
{{--                    <img src="assets/images/img-noti.png" alt="">--}}

                    <div class="header-content">
                        <h4 class="title">{{$object['object_display_name']}}</h4>
                        <p class="date">{{output_date($object['created_at'])}}</p>
                        <i class="fas fa-share-alt pull-right"></i>
                    </div>

                    <div class="content-ck">
                        {!! $object['object_content'] !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
