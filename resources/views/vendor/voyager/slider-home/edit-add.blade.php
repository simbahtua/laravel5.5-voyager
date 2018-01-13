@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(isset($dataTypeContent->id))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                            @endphp

                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" style=" text-transform: uppercase;" class="form-control" name="title" placeholder="Judul" required value="@if(isset($dataTypeContent->title)){{ $dataTypeContent->title }}@endif"/>
                            </div>

                            <div class="form-group">
                                <label for="name">Type</label>
                                <select class="form-control" name="type" id="optType">
                                    <option value="video" @if(isset($dataTypeContent->type) && $dataTypeContent->type == "video"){{ 'selected="selected"' }}@endif>Video </option>
                                    <option value="image" @if(isset($dataTypeContent->type) && $dataTypeContent->type == "image"){{ 'selected="selected"' }}@endif>File Gambar</option>
                                </select>
                            </div>
                            <div class="form-group" id="slider-value">
                                <label for="name" id="slider_title">URL</label>
                                <input id="value" type="text" class="form-control" name="url" placeholder="URL" required value="@if(isset($dataTypeContent->value)){{ $dataTypeContent->value }}@endif"/>
                            </div>

                            
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager.generic.save') }}</button>
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
            // $("#slider_title").html('');
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
                $("#value").remove();
                var par = $("#slider-value");
                if(selected == 'video') {                
                    $("#slider_title").html('URL');
                    var new_element = '<input id="value" type="text" class="form-control" name="value" placeholder="URL" required="required" value="'+lastValue+'"/>';
                } else if(selected == 'image') {
                    $("#slider_title").html('Upload File');
                    var new_element = '<input id="value" type="file" class="form-control" name="value" placeholder="FILE" required value="@if(isset($dataTypeContent->value)){{ $dataTypeContent->value }}@endif"/>';
                    
                }
                $("#slider-value").append(new_element);
                
            }
            
        });

        


    </script>
@stop
