@extends('template.master')

@section('title')
	Blog | HsienTsungWu
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="section-heading">{{ $post->title }}</h1>
                <p class="lead section-lead">{{ $post->content }}</p>
            </div>
        </div>
    </div>
@stop