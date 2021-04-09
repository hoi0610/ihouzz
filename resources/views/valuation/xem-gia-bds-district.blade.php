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
                                    <p>Tham khảo giá nhà đất Việt Nam, giá nhà Việt Nam cập nhật mới nhất {{ \Carbon\Carbon::now()->year }}. Chi tiết bảo giá nhà đất Việt Nam</p>
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

                                @if(!empty($priceRange))
                                    @foreach($priceRange as $item)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $item['name'] ?? '' }}</a></td>
                                            <td class="text-right">
                                                <div class="col-price">
                                                    <div class="price-col">{{ format_price($item['price_average']) ?? '' }} /m<sup>2</sup></div>
                                                    <div class="status-col">{{ $item['fluctuation'] ?? '' }}% @if(!is_null($item['fluctuation']) && $item['fluctuation'] > 0) <i class="fas fa-caret-up"></i> @else <i class="fas fa-caret-down"></i> @endif</div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>

                    <livewire:table-price-range-by-street :districtId="$id" />
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
            labels: ['Mặt tiền', 'nhà phố', 'Căn hộ', 'Hẻm, ngõ', 'Đất nền'],
            datasets: [{
                label: 'Giá nhà đất tháng 01/2021',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    600,
                    0,
                    0,
                    0,
                    0
                ]
            }]
        };

        //line chart====
        var config = {
            type: 'line',
            data: {
                labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019','8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
                datasets: [{
                    label: 'Mặt tiền, nhà phố',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    fill: false,
                }, {
                    label: 'Hẻm, ngỏ',
                    fill: false,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10
                    ],
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

        //line chart===
        var config1 = {
            type: 'line',
            data: {
                labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019','8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
                datasets: [{
                    label: 'Đường',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    fill: false,
                }, {
                    label: 'Quận',
                    fill: false,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10
                    ],
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
