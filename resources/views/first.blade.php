@extends('layouts.app2')

@section('title', '| Welcome')
@section('content')
    <!-- Header -->
    <div class="header bg-gradient-secondary py-7 py-lg-8 pt-lg-3">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-primary" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <style>
        .c {
            filter: brightness(40%);
            border-radius: 15px;

        }
    </style>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-8 col-md-8">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-mdb-ride="carousel"
                    data-mdb-interval="true">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-mdb-interval="2000">
                            <img src="{{ asset('img/theme/bb1.jpg') }}" class="d-block w-100 c" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="https://dchauriga.com/en/solutions/market-management-solutions/" class="btn btn-icon btn-primary mb-4" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                    <span class="btn-inner--text">Lihat artikel</span>
                                </a>
                                <p>Our local regulatory, marketing and sales teams will work with you to understand your requirements and help you achieve market success.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/theme/bb2.jpg') }}" class="d-block w-100 c" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="https://dchauriga.com/en/solutions/supply-chain-solutions/" class="btn btn-icon btn-primary mb-4" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                    <span class="btn-inner--text">Lihat artikel</span>
                                </a>
                                <p>Our network covers Asia with a full range of transport and warehousing services equipped with the technology to provide total transparency and real-time data. Our supply chains are designed to be responsive and optimised to your in-market needs.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/theme/bb3.jpg') }}" class="d-block w-100 c" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="https://dchauriga.com/en/solutions/products-and-networks/" class="btn btn-icon btn-primary mb-4" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                    <span class="btn-inner--text">Lihat artikel</span>
                                </a>
                                <p>Our teams have a wide range of product expertise in pharmaceuticals, devices and consumer health products and a wide customer network to help you achieve your market penetration potential.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
