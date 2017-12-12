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
                                    <h4 class="subtitle">Cek Data Pemilih Sementara</h4>
                                </div>
								
                                <div class="panel-body">
                                    @if(!empty($pemilu))
                                	@if(Session::has('message'))
									    <div class="alert alert-info">
									      {{Session::get('message')}}
									    </div>
									@endif
                                    {!! Form::open(['route'=>'cari']) !!}
                                        <div class="form-group">
                                        	{!! Form::label('PEMILU:','',['for' => "inputserial1", 'class' => "col-sm-4 control-label"]) !!}
                                            <div class="col-sm-8">
                                        	{!! Form::select('idPemilu', $pemilu, null, array('class' => 'form-control')) !!}
                                        	</div>

                                        </div>
                                        <div class="form-group {{ $errors->has('inpktp') ? 'has-error' : '' }}">
                                            {!! Form::label('No.KTP Pemilih:','',['for' => "inputserial1", 'class' => "col-sm-4 control-label"]) !!}
                                            <div class="col-sm-8">
                                            {!! Form::number('inpktp', old('inpktp'), ['class'=>'form-control', 'placeholder'=>'Masukkan No. KTP ANDA']) !!}
                                            
                                            <span class="text-danger">{{ $errors->first('inpktp') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <hr>
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button class="btn btn-success">CEK DPS </button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                    
                                    @else
                                    	<div class="alert alert-info">
                                    		Untuk Saat Ini Pengecekan DPS Belum dapat dilakukan 
                                    	</div>
                                    @endif

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection