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
        ['link' => '#', 'name' => 'Định giá'],
        ['link' => '#', 'name' => 'Tp Hồ Chí Minh'],
        ['link' => '#', 'name' => 'Quận 1']
    ]])
    <section class="view-price-poverty">
        <div class="container">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-9">
                        <livewire:quick-search-property />

                        <div class="table-price-poverty">
                            <div class="header-table">
                                <div class="text">
                                    <strong class="title-table">Tham khảo giá đất {{ $districtName }} cập nhật mới nhất - Tháng {{ \Carbon\Carbon::now()->format('m/Y') }}</strong>
                                    <strong>Giá nhà đất tháng {{ \Carbon\Carbon::now()->format('m/Y') }}</strong>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Loại bất động sản</th>
                                    <th class="text-right">Giá trung bình</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($priceRangeUpdate))
                                        @foreach($priceRangeUpdate as $item)
                                            <tr>
                                                <td><a href="#">{{ $item['property_type']['name'] ?? '' }}</a></td>
                                                <td class="text-right">
                                                    <div class="col-price">
                                                        <div class="price-col">{{ format_price($item['price_average']) }}/m<sup>2</sup></div>
                                                        <div class="status-col">{{ $item['fluctuation'] ?? '' }}% @if(isset($item['fluctuation']) && $item['fluctuation'] > 0) <i class="fas fa-caret-up"></i> @else <i class="fas fa-caret-down"></i> @endif</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="chart">
                            <canvas id="canvas"></canvas>
                        </div>

                        <div class="chart">
                            <strong>Xu thế giá</strong>
                            <canvas id="canvas-line"></canvas>
                        </div>

                        <livewire:table-price-trends :labels="$labels" :id="$id"/>

                        <div class="chart">
                            <strong>So sánh giá nhà đất giữa đường và quận</strong>
                            <canvas id="canvas-line1"></canvas>
                        </div>

                        <div class="table-price-poverty">
                            <div class="header-table">
                                <strong class="title-table">Giá trung bình</strong>
                            </div>

                            <div class="body-table row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Giá trung bình cao nhất</th>
                                            <th class="text-right">Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($priceMax))
                                                @foreach($priceMax as $value)
                                                    <tr>
                                                        <td>{{ $value['street_name'] ?? '' }}</td>
                                                        <td class="text-right">
                                                            <div class="col-price">
                                                                <div class="price-col">{{ format_price($value['price_average']) }}/m<sup>2</sup></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Giá trung bình thấp nhất</th>
                                            <th class="text-right">Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($priceMin))
                                                @foreach($priceMin as $value)
                                                    <tr>
                                                        <td>{{ $value['street_name'] ?? '' }}</td>
                                                        <td class="text-right">
                                                            <div class="col-price">
                                                                <div class="price-col">{{ format_price($value['price_average']) }}/m<sup>2</sup></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 no-padding-left">
                        <div class="wrap-box">
                            <x-count-product-sell/>
                            <a href="#" class="banner-box">
                                <img src="/html/assets/images/banner-box2.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_scripts')
    <script>
        var color = Chart.helpers.color;
        var barChartData = {
            labels: {!! json_encode( $labels3->toArray()) !!},
            datasets: [{
                label: 'Giá nhà đất tháng {{ \Carbon\Carbon::now()->format('m/Y') }}',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: {!! json_encode($dataCategory->toArray()) !!}
            }]
        };

        //line chart====
        var config = {
            type: 'line',
            data: {
                labels: {!! json_encode($labels->toArray()) !!},
                datasets: {!! json_encode($chart->toArray()) !!}
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }
                }
            }
        };

        //line chart===
        var config1 = {
            type: 'line',
            data: {
                labels: {!! json_encode($labels2->toArray()) !!},
                datasets: [{
                    label: 'Đường',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.blue,
                    data: {!! json_encode( $dataStreet->toArray()) !!},
                    fill: false,
                }, {
                    label: 'Quận',
                    fill: false,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: {!! json_encode( $dataDistrict->toArray()) !!},
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });
            var ctx1 = document.getElementById('canvas-line').getContext('2d');
            window.myLine = new Chart(ctx1, config);
            var ctx2 = document.getElementById('canvas-line1').getContext('2d');
            window.myLine = new Chart(ctx2, config1);
        };
    </script>
@stop
