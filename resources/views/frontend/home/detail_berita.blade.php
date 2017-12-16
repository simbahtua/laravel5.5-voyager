@extends('frontend.home.app')
@section('content')
<div class="page_header_wrap" style="background: url(<?php echo e(asset('web/images/bg-header.jpg')); ?>) center -25px no-repeat">
    <div class="container">
        <h2 class="page_category">{{ $page_title }}</h2>
    </div>
</div> 
<div class="container">

    <div class="panel panel-default panel-content">
        <div class="panel-heading">
            <ol class="breadcrumb">
                <li><a href="#">Pemerintah Kab. Bantaeng </a></li>
                <li><a href="#">Pengumuman</a></li>
                <li class="active">Pedoman Peringatan Hari Kesaktian Pancasila Tahun 2017</li>
            </ol>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <!-- main content -->
                <div class="col-md-8" id="main-content">
                    <div class="widget-post">
                        <div class="post-heading">
                            <h1 class="post-title">{{ $data->title }}</h1>
                            <div class="clearfix"></div>
                            <ul class="meta">
                                <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                <li class="post-meta-author"><i class="fa fa-user"></i>Oleh: <a href="#" title="Post Title" rel="author">{{ $data->name }}</a></li>
                                <li class="post-meta-view"><i class="fa fa-file-text"></i>Dibaca: 3012 Kali</li>
                                <li class="post-meta-comments comments-scroll"><i class="fa fa-comments"></i><a href="#">0 Komentar</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <img src="uploads/news/news-large.jpg" class="img-content">
                            <p>{{ strip_tags($data->body) }}</p>
                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="col-md-4" id="side">
                    <div class="panel panel-default panel-theme">
                        <div class="panel-heading">
                            <h2>Berita Lainnya</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="sidebar-list">
                                <li>
                                    <a href="#" title="AKBP Asfuri Resmi Jabat Kapolres Bantaeng Kota">AKBP Asfuri Resmi Jabat Kapolres Bantaeng Kota</a>
                                    <ul class="meta">
                                        <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM">Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM</a>
                                    <ul class="meta">
                                        <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Pameran Produk Perikanan UMM Disambut Antusias">Pameran Produk Perikanan UMM Disambut Antusias</a>
                                    <ul class="meta">
                                        <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Lagi, Kota Bantaeng Raih Penghargaan Natamukti">Lagi, Kota Bantaeng Raih Penghargaan Natamukti</a>
                                    <ul class="meta">
                                        <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Bakesbangpol Kota Bantaeng Sosialisasikan Regulasi Pilkada 2018">Bakesbangpol Kota Bantaeng Sosialisasikan Regulasi Pilkada 2018</a>
                                    <ul class="meta">
                                        <li class="post-meta-date"><i class="fa fa-clock-o"></i>Selasa, 26 September 2017 16:25 WIB</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection