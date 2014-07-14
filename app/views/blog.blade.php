@extends('template.master')

@section('title')
	Blog | HsienTsungWu
@stop

@section('content')
    @foreach ($posts as $post)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="section-heading">{{ $post['title'] }}</h1>
                    <p class="lead section-lead">{{{ $post['content'] }}}</p>
                </div>
            </div>
        </div>
    @endforeach
@stop