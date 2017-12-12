@extends('frontend.home.app')
@section('content')
<div class="container">

        <div class="panel panel-default panel-content">
            <div class="panel-heading">
                <ol class="breadcrumb">
                    <li><a href="#">Beranda</a></li>
                    <li class="active">Form</li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-md-4" id="side">
                        <div class="panel panel-default panel-theme" id="widget-submenu">
                            <div class="panel-heading">
                                <h2>Informasi Lainnya</h2>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item" target="_top"><i class="fa fa-chevron-circle-right"></i>Aplikasi 1</a>
                                    <a href="#" class="list-group-item" target="_top"><i class="fa fa-chevron-circle-right"></i>Aplikasi 2</a>
                                    <a href="#" class="list-group-item" target="_top"><i class="fa fa-chevron-circle-right"></i>Aplikasi 3</a>
                                    <a href="#" class="list-group-item" target="_top"><i class="fa fa-chevron-circle-right"></i>Aplikasi 4</a>
                                    <a href="#" class="list-group-item" target="_top"><i class="fa fa-chevron-circle-right"></i>Aplikasi 5</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- main content -->
                    <div class="col-md-8" id="main-content">
                        <div class="widget">
                            <div class="panel panel-default panel-theme panel-silver">
                                <div class="panel-heading">
                                    <h4 class="subtitle">Cek Data Pemilih Tetap</h4>
                                </div>

                                <div class="panel-body">
                                    <!--<form action="" method="post" name="frm_cek">-->
                                    <form action="">
                                        <div class="form-group">
                                            <label for="inputserial1" class="col-sm-4 control-label">No.KTP Pemilih</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="serial" placeholder="masukkan nomor ktp pemilih...">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <hr>
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <input id="button" name="cek" type="submit" value="Cek No KTP" class="btn btn-warning">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection