@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @if(isset($data))
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => route('faq'), 'name' => 'Câu hỏi thường gặp'],
        ['link' => '#', 'name' => $data['name_category']]
    ]])
    @endif

    @include('includes.option')

    <section class="wrap-faq">
        <div class="container">
            <strong class="title-main">{{$data['name_category']}}</strong>
            <div id="accordion" class="list-questions">
                @foreach($data['items'] as $key=>$item)
                <div class="card">
                    <div class="card-header" id="heading{{$item['id']}}">
                        <h5 class="mb-0">
                            <button class="btn-link {{$key == 0 ? "" : "collapsed"}}" data-toggle="collapse" data-target="#collapse{{$item['id']}}"
                                    aria-expanded="{{$key == 0 ? "true" : "false"}}" aria-controls="collapse{{$item['id']}}">
                                {!! $item['question'] !!}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{$item['id']}}" class="collapse {{$key == 0 ? "in" : ""}}" aria-labelledby="heading{{$item['id']}}" data-parent="#accordion">
                        <div class="card-body">
                            {!! $item['answer'] !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
