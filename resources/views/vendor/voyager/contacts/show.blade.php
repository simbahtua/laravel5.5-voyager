@extends('voyager::master')

@section('page_title', 'Kontak Kami')

@section('page_header')
<div class="container-fluid">
	<h1 class="page-title">
		<i class="voyager-telephone"></i> Kontak Kami
	</h1>
</div>
@stop

@section('content')
<div class="page-content browse container-fluid">
	@include('voyager::alerts')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-bordered table-striped">
				<form role="form" class="form-edit-add" action="{{ route('voyager.contact-us.store') }}" method="POST" enctype="multipart/form-data">
					@if(isset($data->id))
					{{ method_field("PUT") }}
					@endif
					<input type="hidden" name="id" value="@if(isset($data->id)){{ $data->id }}@endif" />
					{{ csrf_field() }}
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('alamat','ALAMAT',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<textarea name="alamat" class="form-control" cols="10" rows="3">@if(isset($data->alamat)){{ $data->alamat }}@endif</textarea>
										
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('phone','Nomor Telepon',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<input type="text" name="phone" value="@if(isset($data->phone)){{ $data->phone }}@endif" class="form-control" />
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('instagram','INSTAGRAM',['class'=>'col-md-3']) !!}
									
									<div class="col-md-9">
										<input type="text" name="instagram" value="@if(isset($data->instagram)){{ $data->instagram }}@endif" class="form-control" />
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('facebook','FACEBOOK',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<input type="text" name="facebook" value="@if(isset($data->facebook)){{ $data->facebook }}@endif" class="form-control" />
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('twitter','TWITTER',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<input type="text" name="twitter" value="@if(isset($data->twitter)){{ $data->twitter }}@endif" class="form-control" />
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('description','INFORMASI TAMBAHAN',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<textarea class="form-control richTextBox" id="richtextbody" name="description" style="border:0px;">@if(isset($data->description)){{ $data->description }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="panel-footer">
						<button type="submit" class="btn btn-primary save">SIMPAN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop