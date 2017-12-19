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
                <li><a href="#">Beranda</a></li>
                <li class="active">Dokumen</li>                
            </ol>
        </div>

        <div class="panel-body">
            <div class="row">
                <!-- main content -->
                <div class="col-md-8" id="main-content">
                    <div class="widget-post">
                        <div class="post-heading">
                            <h1 class="post-title">File Dokumen</h1>
                        </div>
                        <div class="post-list">
                            <ul>                                
                                @if(!empty($dokumen))
                                @foreach ($dokumen as $row_dokumen)
                                @php
                                $date = date('d-m-Y');
                                $file = json_decode($row_dokumen->filename);
                                $download_link = $file[0]->download_link;
                                @endphp
                                <li>
                                    <span></span>     <a href="<?php echo e(asset('storage/')); ?>/{{$download_link}}" download="{{ $row_dokumen->title }}_{{$date}}" class="headline-title" target="_blank" title="{{ $row_dokumen->title }}">{{ $row_dokumen->title }}</a>                                            
                                </li>
                                @endforeach
                                @else 
                                <div class="alert alert-info">
                                    Data Berita Belum Ada 
                                </div>
                                @endif
                            </ul>

                            <ul class="pagination">
<!--                                <li class="active"><span class="page-numbers">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><span class="page-numbers dots">…</span></li>
                                <li><a class="page-numbers" href="#">20</a></li>
                                <li><a class="page-numbers" href="#">»</a></li>-->

                                {!! $dokumen->render() !!} 
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection