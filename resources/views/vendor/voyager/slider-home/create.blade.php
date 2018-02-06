@extends('voyager::master')

@section('page_title', 'Slider halaman utama')

@section('page_header')
<div class="container-fluid">
	<h1 class="page-title">
		<i class="voyager-images"></i> Slider halaman utama
	</h1>
</div>
@stop

@section('content')
<div class="page-content browse container-fluid">
	@include('voyager::alerts')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-bordered table-striped">

				@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<form action="{{ route('voyager.slider-home.store') }}"
                      method="POST" role="form" enctype="multipart/form-data">

					@if(isset($data->id))
					{{ method_field("PUT") }}
					@endif
					<input type="hidden" name="id" value="@if(isset($data->id)){{ $data->id }}@endif" />
					{{ csrf_field() }}
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('title','Title SLider',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<input type="text" name="title" class="form-control" cols="10" rows="3">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12" >
								<div class="form-group">
									{!! Form::label('type','Type',['class'=>'col-md-3']) !!}
									<div class="col-md-9">
										<select class="form-control" name="type" id="optType">
                                            <option value="video" selected="selected"> VIDEO </option>
                                            <option value="image"> IMAGE </option>
                                        </select>
									</div>
								</div>
							</div>


							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									{!! Form::label('value','URL',['class'=>'col-md-3','id' => 'slider_title']) !!}

									<div class="col-md-9"  id="slider-value">
										<input type="text" name="video_url" id="value" class="form-control" />
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

@section('javascript')
    <script>
        $('document').ready(function () {
        	var optValue = $("#optType option:selected").val();
            var curSelected = optValue;
            var curValue = $("#value").val();
            setOptValue(curSelected, optValue, curValue);


            $("#optType").change(function() {
                var optValue = $("#optType option:selected").val();                
                
                setOptValue(optValue, curSelected, curValue);
            });

            function setOptValue(selected, lastSelected, lastValue) {
                $("#slider_title").html('');
                $("#slider-value").html('');
                var par = $("#slider-value");

                if(selected == 'video') {                
                    $("#slider_title").html('URL VIDEO ');
                    var new_element = '<input id="value" type="text" class="form-control" name="video_url" placeholder="URL" required="required" value="'+lastValue+'"/> <span>Penulisan URL Video harus disertai dengan http:// <br>contoh : http://youtube.com</span>';
                } else if(selected == 'image') {
                    $("#slider_title").html('Upload File');
                    var new_element = '<input id="value" type="file" name="image_file" placeholder="FILE" required value="@if(isset($dataTypeContent->value)){{ $dataTypeContent->value }}@endif"/> <span>type file yang diperbolehkan .jpg; .png; .jpeg</span>';
                }
                $("#slider-value").append(new_element);
                
            }
        });


    </script>
@stop
