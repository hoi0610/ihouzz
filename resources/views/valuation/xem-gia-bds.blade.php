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
    ]])
    <section class="view-price-poverty">
        <div class="container">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-9">
                        <livewire:quick-search-property />

                        <livewire:table-price-range-by-province />
                    </div>
                    <div class="col-md-3 no-padding-left">
                        <div class="wrap-box">
                            <x-count-product-sell/>
                            <a href="#" class="banner-box">
                                <img src="html/assets/images/banner-box2.png" alt="">
                            </a>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

