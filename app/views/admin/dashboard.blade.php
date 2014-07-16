@extends('template.master')

@section('title')
  Dashboard | HsienTsungWu
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- msg -->
                @if (Session::has('msg-success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('msg-success') }}</div>
                @endif

                Welcome to HsienTsungWu Dashboard
            </div>
        </div>
    </div>
@stop