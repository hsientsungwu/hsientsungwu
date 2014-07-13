@extends('template.master')

@section('title')
	Home | HsienTsungWu
@stop

@section('content')
	<div class="container top-posts">
        <div class="row">
            <div class="col-sm-4 section">
                <h1 class="section-heading">Top Post #1</h1>
                <p class="lead section-lead">This stylish template features placeholder images from placehold.it and lorempixel! With some custom font stylings and awesome photos, you will have a beautiful website up and running in no time!</p>
                <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo. Phasellus vestibulum sagittis purus laoreet varius. Pellentesque malesuada malesuada mattis. Aliquam sed porta nisi, eget suscipit dolor. Nam ipsum sapien, rhoncus eu leo eu, ultricies pellentesque tellus.</p>
            </div>
            <div class="col-sm-4 section">
                <h1 class="section-heading">Top Post #2</h1>
                <p class="lead section-lead">This stylish template features placeholder images from placehold.it and lorempixel! With some custom font stylings and awesome photos, you will have a beautiful website up and running in no time!</p>
                <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo. Phasellus vestibulum sagittis purus laoreet varius. Pellentesque malesuada malesuada mattis. Aliquam sed porta nisi, eget suscipit dolor. Nam ipsum sapien, rhoncus eu leo eu, ultricies pellentesque tellus.</p>
            </div>
            <div class="col-sm-4 section">
                <h1 class="section-heading">Top Post #3</h1>
                <p class="lead section-lead">This stylish template features placeholder images from placehold.it and lorempixel! With some custom font stylings and awesome photos, you will have a beautiful website up and running in no time!</p>
                <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo. Phasellus vestibulum sagittis purus laoreet varius. Pellentesque malesuada malesuada mattis. Aliquam sed porta nisi, eget suscipit dolor. Nam ipsum sapien, rhoncus eu leo eu, ultricies pellentesque tellus.</p>
            </div>
        </div>
    </div>

    <div class="container top-portfolios">
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/cabin.png" class="img-responsive" alt="" />
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/cake.png" class="img-responsive" alt="" />
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/circus.png" class="img-responsive" alt="" />
                </a>
            </div>
        </div>
    </div>
@stop