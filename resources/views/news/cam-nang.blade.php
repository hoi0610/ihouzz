@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <div>
        @include('includes.breadcrumb', ['breadcrumb' => [
            ['link' => route('home.index'), 'name' => 'IHouzz'],
            ['link' => '#', 'name' => 'Cẩm nang nổi bật'],
        ]])

        @include('includes.option')

        <section class="wrap-news-page">
            <div class="container">
                <h3 class="title-block">Cẩm nang nổi bật</h3>
                <div class="toolbar-wp">
                    <div class="place-slide">
                        <ul class="list-place-slide">
                            <li class="item"><a class="active" href="javascript:void(0)">Tất cả</a></li>
                            <li class="item"><a href="javascript:void(0)">Phong cách sống</a></li>
                            <li class="item"><a href="javascript:void(0)">Kinh nghiệm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block block-hot-news">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-news">
                                <div class="wrap-mg"><img src="/html/assets/images/camnang.png" alt=""></div>
                                <div class="text">
                                    <strong class="title">Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                    </strong>
                                    <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 news-small">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-news">
                                        <div class="wrap-mg"><img src="/html/assets/images/hot-news.png" alt=""></div>
                                        <div class="text">
                                            <strong class="title">Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-news">
                                        <div class="wrap-mg"><img src="/html/assets/images/hot-news.png" alt=""></div>
                                        <div class="text">
                                            <strong class="title"> Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-news">
                                        <div class="wrap-mg"><img src="/html/assets/images/hot-news.png" alt=""></div>
                                        <div class="text">
                                            <strong class="title">Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-news">
                                        <div class="wrap-mg"><img src="/html/assets/images/hot-news.png" alt=""></div>
                                        <div class="text">
                                            <strong class="title"> Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-content row">
                    <div class="col-md-9">
                        <div class="block-news">
                            <div class="row">

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('tin-tuc.show', ['id' => 1]) }}" class="item-small">
                                        <div class="wrap-img"><img src="/html/assets/images/news.png" alt=""></div>
                                        <div class="content">
                                            <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                            </strong>
                                            <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut ....
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <nav aria-label="Page navigation" class="wp-pagination mt-15">
                            <ul class="pagination">
                                <li class="page-item prev">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item next">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
        </section>
    </div>
@endsection

