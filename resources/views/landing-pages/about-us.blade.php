@extends('layouts.master')

@section('body_class', 'refresh-page  page-header-static')
@section('main_class', 'news-page')

@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Giới thiệu'],
    ]])

    @foreach($positions as $key => $position)
        @if(view()->exists('landing-pages.includes-about-us.'.$position['home_position_type_key']))
            @include('landing-pages.includes-about-us.'.$position['home_position_type_key'], ['position' => $position])
        @endif
    @endforeach
@endsection

@section('after_styles')
    <style>
        .vision-mission .content .one__block + .one__block:not(.one__block:last-child):after {
            content: '';
            width: 1px;
            height: 100px;
            border-left: 1px solid #fff;
            position: absolute;
            top: 10px;
            right: 0;
        }
        .row > [class*=col-] {
            padding: 7px 8px !important;
        }
        .min-h {
            min-height: 250px;
            max-height: 250px;
        }
    </style>
@endsection
