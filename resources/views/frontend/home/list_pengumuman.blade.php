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
                <li><a href="#">Komisi Pemilihan Umum Kabupaten Bantaeng</a></li>
                <li><a href="#">List Pengumuman</a></li>
                <li class="active">Pengumuman</li>
            </ol>

        </div>
        <div class="panel-body">
            <div class="row">
                <!-- main content -->
                <div class="col-md-8" id="main-content">
                    <div class="widget-post">
                        <div class="post-heading">
                            <h1 class="post-title">Pengumuman Terkini</h1>
                        </div>
                        <div class="post-list">
                            <ul>                                
                                @if(!empty($data))
                                @foreach ($data as $row)
                                    @php
                                        $text = substr($row->body, 0, 350);
                                        $date = $row->created_at;
                                        $hari = date('l', strtotime($date)); 
                                        $tanggal = date('d M Y', strtotime($date));  
                                    @endphp
                                <li>
                                    <div class="list-head">
                                        <div class="list-post-date">
                                            <strong>{{ $hari }}</strong>
                                            {{ $tanggal }} 
                                        </div>
                                        <div class="list-post-title">
                                            <h3><a href="#" title="Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM">{{ $row->title }}</a></h3>
                                            <ul class="meta">
                                                <li class="post-meta-author"><i class="fa fa-user"></i>Oleh: <a href="#" title="Post Title" rel="author">{{ $row->name }}</a></li>
                                                <li class="post-meta-view"><i class="fa fa-file-text"></i>Dibaca: 3012 Kali</li>
                                                <li class="post-meta-comments comments-scroll"><i class="fa fa-comments"></i><a href="#">0 Komentar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="list-content">
                                        <div class="list-post-img">
                                            <a href="#" title="Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM" class="loop-entry-thumbnail"><img src="<?php echo e(asset('storage/')); ?>/{{$row->image}}" alt="Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM"></a>
                                        </div>
                                        <div class="list-post-data">
                                            <p>{{ strip_tags($text) }}...</p>
                                            <p><a href="{{route('detail_berita', [$row->id])}}" title="Baca Selengkapnya : Dinas Kominfo Gelar Bimtek Operasional Aplikasi e-SPM" class="btn btn-default btn-sm">Selengkapnya</a></p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @else 
                                <div class="alert alert-info">
                                    Data Pengumuman Belum Ada 
                                </div>
                                @endif
                            </ul>

                            <ul class="pagination">
                                <li class="active"><span class="page-numbers">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><span class="page-numbers dots">…</span></li>
                                <li><a class="page-numbers" href="#">20</a></li>
                                <li><a class="page-numbers" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="col-md-4" id="side">
                    <div class="panel panel-default panel-theme">
                        <div class="panel-heading">
                            <h2>Pengumuman Lainnya</h2>
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