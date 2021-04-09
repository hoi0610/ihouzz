@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
<style>
    .news-page .block-hot-news .item-news .wrap-mg img {
        height: 100%;
    }
     .item-news .text {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: #fff;
        padding: 10px 20px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
    }
    .item-news .title {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        font-weight: bold;
        max-height: 2.125em;
        word-wrap: break-word;
    }
    .news-page .block-hot-news .news-small .item-news {
        margin-bottom: 15px;
    }
    .news-page .wrap-box .title-hot {
        font-size: 16px;
        margin-bottom: 15px;
        display: block;
        margin-top: 10px;
    }
</style>
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Tin tức bất động sản'],
    ]])
    @include('includes.option')

    <section class="wrap-news-page">
        <div class="container">
            <h3 class="title-block">Tin tức bất động sản</h3>
            <div class="news-content row">
                <div class="col-md-9">
                    <div class="block block-hot-news">
                        <div class="top-head">
                            <span class="label-hot"> Tin hot</span>
                            <strong>TOP 5 quận đáng sống nhất ở TPHCM</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item-news">
                                    <div class="wrap-mg"><img src="{{ asset('html/assets/images/main-hot-news.png') }}" alt=""></div>
                                    <div class="text">
                                        <strong class="title">Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                        </strong>
                                        <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 news-small">
                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item-news">
                                    <div class="wrap-mg"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text">
                                        <strong class="title">Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                        </strong>
                                        <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                    </div>
                                </a>
                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item-news">
                                    <div class="wrap-mg"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text">
                                        <strong class="title"> Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                        </strong>
                                        <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="block block-social-news">
                        <div class="header-top">
                            <div class="title">
                                <strong>Tin thị trường</strong>
                                <a href="#">Xem thêm</a>
                            </div>
                            <select name="" id="" class="form-control">
                                <option value="">Tư vấn pháp lý</option>
                                <option value="">Tư vấn pháp lý</option>
                                <option value="">Tư vấn pháp lý</option>
                            </select>
                        </div>
                        <div class="content-news row">
                            <div class="col-md-6">
                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item-large">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/social-news.png') }}" alt=""></div>
                                    <div class="content">
                                        <strong class="title"> Chính thức động thổ khu căn hộ cao cấp LDG Sky
                                        </strong>
                                        <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                        <div class="text">
                                            Ngày 24/01/2021, Công ty CP đầu tư LDG (LDG Group – Mã CK: LDG – HoSE) đã tổ chức Lễ Động thổ Khu căn hộ cao cấp LDG Sky tọa lạc tại cửa ngõ phía Đông TP.HCM, ngay khu đô thị Đại học Quốc gia.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('tin-tuc.detail', 1) }}" class="item-small">
                                            <div class="wrap-img"><img src="{{ asset('html/assets/images/news.png') }}" alt=""></div>
                                            <div class="content">
                                                <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                                </strong>
                                                <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('tin-tuc.detail', 1) }}" class="item-small">
                                            <div class="wrap-img"><img src="{{ asset('html/assets/images/news.png') }}" alt=""></div>
                                            <div class="content">
                                                <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                                </strong>
                                                <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('tin-tuc.detail', 1) }}" class="item-small">
                                            <div class="wrap-img"><img src="{{ asset('html/assets/images/news.png') }}" alt=""></div>
                                            <div class="content">
                                                <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                                </strong>
                                                <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('tin-tuc.detail', 1) }}" class="item-small">
                                            <div class="wrap-img"><img src="{{ asset('html/assets/images/news.png') }}" alt=""></div>
                                            <div class="content">
                                                <strong class="title"> 5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt ...
                                                </strong>
                                                <div class="time"><i class="far fa-clock"></i> 12/01/2020</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-news">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/news.png') }}" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                                <a href="#" class="item-small">
                                    <div class="wrap-img"><img src="html/assets/images/news.png" alt=""></div>
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
                        <strong class="title-hot">Tin nóng</strong>
                        <div class="slide-news-small">
                            <div class="item-slide wrap-hot-news-small">

                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="{{ route('tin-tuc.detail', 1) }}" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
                            <div class="item-slide wrap-hot-news-small">

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
                            <div class="item-slide wrap-hot-news-small">

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="html/assets/images/hot-news.png" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
                        </div>

                        <x-count-product-sell/>
                        <a href="#" class="banner-box">
                            <img src="html/assets/images/banner-box2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

