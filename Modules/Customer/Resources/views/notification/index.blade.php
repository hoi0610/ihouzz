@extends('booking::layouts.eworkee',['header_back' => route('booking.index'),'header_title' => 'Thông báo'])

@section('content')
    <main class="notification">
        <section class="section-noti ">
            <ul class="list-notification">
                <?php
                $object_types = [
                    'points' => 'fas fa-star color',
                    'coupon' => 'fas fa-gift color',
                    'news-sale' => 'fas fa-tag color',
                    'booking' => 'fas fa-dolly color',
                    'rate-booking' => 'fas fa-medal color',
                    ];
                $object_bookings = [];
                ?>
            @foreach($objects['data'] as $item)
                <?php
                        if ($item['object_type'] == 'booking' || $item['object_type'] == 'rate-booking') {
                            $object_bookings[] = $item;
                            continue;
                        }
                        ?>
                <li class="item item_notification">
                    <div class="container">
                        <div class="show-content">
                            <span class="icon"><i class="{{$object_types[$item['object_type']] ?? 'fas fa-star color'}}"></i></span>
                            <div class="content">
                                <a href="javascript:void(0)">
                                    <h4 class="title-item">{{$item['object_display_name']}}</h4>
                                </a>
                                <div class="content-ck">{!! $item['object_content'] !!}</div>
                                <p class="date">{{output_date($item['created_at'])}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="remove-action remove_action" data-id="{{$item['notification_id']}}">
                        <div class="inside">
                            <i class="fas fa-trash-alt"></i>
                            <span class="text">Xóa</span>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
        <!--section-->
        @if(!empty($object_bookings))
        <section class="section-noti ">
            <div class="title-section">
                <div class="container"><h3 class="title-block">Cập nhật đơn hàng</h3></div>
            </div>
            <ul class="list-notification">
                @foreach($objects['data'] as $item)
                    <?php
                    if ($item['object_type'] != 'booking' && $item['object_type'] != 'rate-booking') continue;
                    ?>
                <li class="item item_notification">
                    <div class="container">
                        <div class="show-content">
                            <span class="icon"><i class="{{$object_types[$item['object_type']] ?? 'fas fa-dolly color'}}"></i></span>
                            <div class="content">
                                <a href="{{route('notification.show', ['slug' => str_slug($item['object_display_name']), 'id' => $item['notification_id']])}}">
                                    <h4 class="title-item">{{$item['object_display_name']}}</h4>
                                </a>
                                <div class="content-ck">{!! $item['object_content'] !!}</div>
                                <p class="date">{{output_date($item['created_at'])}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="remove-action remove_action" data-id="{{$item['notification_id']}}">
                        <div class="inside">
                            <i class="fas fa-trash-alt"></i>
                            <span class="text">Xóa</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
        @endif
    </main>
@endsection

@section('after_scripts')
    <script>
        $(function () {
            $.post('{{route("notification.reset-counter")}}',function(res){
            })
        });

        $(document).on('click','.remove_action',function(){
            var $this = $(this);
            ajax_loading(true);
            $.post('/account/thong-bao/destroy',{id:$(this).data('id')},function(res){
                console.log(res);
                ajax_loading(false);
                if(res.status){
                    $this.closest('.item_notification').remove();
                }

            })
                .fail(function() {
                    ajax_loading(false);
                })
        })
    </script>
@stop
