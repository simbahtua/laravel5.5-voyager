@extends('frontend.home.app')
@section('content')
<div class="page_header_wrap" style="background: url(<?php echo e(asset('web/images/bg-header.jpg')); ?>) center -25px no-repeat">
    <div class="container">
        <h2 class="page_category">{{ $page_title }}</h2>
    </div>
</div>   
<!-- page title -->
<div class="container">

    <div class="panel panel-default panel-content">
        <div class="panel-heading">
            <ol class="breadcrumb">
                <li><a href="#">Beranda </a></li>
                <li class="active">Kontak Kami</li>
            </ol>
        </div>
        <div class="panel-body">
            <div class="row">
                <!-- main content -->
                <div class="col-md-12" id="main-content">
                    <div class="widget-post">
                        <div class="post-heading">
                            <h1 class="post-title">{{ $page_title }}</h1>
                            <div class="clearfix"></div>
                            <ul class="meta">
                            </ul>
                        </div>
                        <div class="post-content">


                            <u><h3>Komisi Pemilihan Umum Kabupaten Bantaeng</h3></u>
                            <h4>
                                <i class="fa fa-thumb-tack"></i>  {{ $kontak->alamat }}<br><br>
                                <i class="fa fa-phone-square"></i>  {{ $kontak->phone }}<br><br>
                                <i class="fa fa-envelope"></i> {{ $kontak->email }}
                            </h4>
                            <u><h3>Social Media Komisi Pemilihan Umum Kab.Bantaeng</h3></u>
                            <ul class="footer-sosmed">
                                <li><i class="icon-facebook"></i> Facebook: <a href="{{ $kontak->facebook }}" target="_blank">Komisi Pemilihan Umum Bantaeng</a></li>
                                <li><i class="icon-twitter"></i> Twitter: <a href="{{ $kontak->twitter }}" target="_blank">Komisi Pemilihan Umum Bantaeng</a></li>
                                <li><i class="icon-youtube"></i> Instagram: <a href="{{ $kontak->instagram }}" target="_blank">Komisi Pemilihan Umum Bantaeng</a></li>
                            </ul>                                
                        </div>
                    </div>
                </div>

                <!-- sidebar -->

            </div>
        </div>
    </div>
</div>
@endsection