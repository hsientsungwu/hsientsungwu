@extends('template.master')

@section('title')
	Home | HsienTsungWu
@stop

@section('content')

    <div class="container top-portfolios">
        <div class="row">
            <div class="col-lg-12 text-center section-header">
                <h2>Portfolio</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <div class="thumbnail">
                    <img src="/img/portfolio/mabow.png" alt="mabow" class="img-responsive">
                    <div class="caption">
                        <a href="https://github.com/hsientsungwu/mabow" target="_blank"><h3>Mawbow - 媽寶</h3></a>
                        <p>Mabow is a web application that crawls Youtube videos and categorize them into users' needs to maximize user experience. </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 portfolio-item">
                <div class="thumbnail">
                    <img src="/img/portfolio/transmatter.png" alt="mabow" class="img-responsive">
                    <div class="caption">
                        <a href="https://github.com/hsientsungwu/Transmatter/" target="_blank"><h3>Transmatter</h3></a>
                        <p>Transmatter provides the instant search platform from various dictionary databases. It focuses on translation from Chinese (Madarin) to English.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 portfolio-item">
                <div class="thumbnail">
                    <img src="/img/portfolio/usftsa.png" alt="mabow" class="img-responsive">
                    <div class="caption">
                        <a href="http://www.usftsa.com" target="_blank"><h3>USFTSA.COM</h3></a>
                        <p>Student Organization website that features e-news, sponsors, timeline history, survey forms, and various useful functionality for student leader group.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop