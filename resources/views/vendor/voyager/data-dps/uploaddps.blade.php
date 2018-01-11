@extends('voyager::master')

@section('page_title', 'DATA DPS' )

@section('content')
<div class="page-content container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">

            <div class="admin-section-title">
                <h3><i class="voyager-upload"></i> UPLOAD DPS {{ $title_add}}</h3>
            </div>
            <div class="clear"></div>


            <div class="panel panel-bordered panel-primary">
             <div class="panel-heading">
                 <div class="panel-title"> FORM UPLOAD DATA DPS

                 </div>
             </div>
             <div class="panel-body">
                <form id="my_form" action="{{ route('voyager.data-dps.upload', $id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('file','Select File to Import:',['class'=>'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::file('file', array('class' => 'form-control')) !!}
                            {!! $errors->first('file', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


</div><!-- .row -->
</div><!-- .col-md-12 -->
</div><!-- .page-content container-fluid -->


<input type="hidden" id="base_url" value="{{ route('voyager.dashboard') }}">

@stop
