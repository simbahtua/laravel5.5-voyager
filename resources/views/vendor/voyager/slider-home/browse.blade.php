@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Slider Halaman Utama')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i>Slider Halaman Utama
        
    </h1>
    <a href="{{ route('voyager.slider-home.create') }}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>TAMBAH SLIDER</span>
    </a>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p class="panel-title" style="color:#777">DRAG and DROP SLider Untuk Mengurutkan</p>
                    </div>

                    <div class="panel-body" style="padding:30px;">
                        <div class="dd">
                            <ol class="dd-list">
                                @foreach ($sliders as $slider)
                                    <li class="dd-item" data-id="{{ $slider->id }}">
                                        <div class="pull-right item_actions">
                                            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $slider->id }}">
                                                <i class="voyager-trash"></i> {{ __('voyager.generic.delete') }}
                                            </div>
                                            <!-- <div class="btn btn-sm btn-primary pull-right edit"
                                                data-id="{{ $slider->id }}"
                                                data-title="{{ $slider->title }}"
                                                data-type="{{ $slider->type }}"
                                                data-value="{{ $slider->target }}"
                                            >
                                                <i class="voyager-edit"></i> {{ __('voyager.generic.edit') }}
                                            </div> -->
                                        </div>
                                            <div class="dd-handle">
                                                <div class="col-md-3"><span>{{ $slider->title }}</span></div>
                                                <div class="col-md-2"><span>{{ $slider->type }}</span></div>
                                                <div class="col-md-4"><span class="url">{{ $slider->value }}</span></div>
                                                
                                                
                                            </div>

                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Lanjutkan Hapus Data Slider?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.slider-home.destroy', ['id' => '__id']) }}"
                          id="delete_form"
                          method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="LANJUTKAN HAPUS">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">BATAL</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop


@section('javascript')
<script>
    $(document).ready(function () {
        $('.dd').nestable({/* config options */});

        $('.item_actions').on('click', '.delete', function (e) {
            id = $(e.currentTarget).data('id');
            $('#delete_form')[0].action = $('#delete_form')[0].action.replace("__id",id);
            $('#delete_modal').modal('show');
        });

        /**
         * Reorder items
         */
        $('.dd').on('change', function (e) {
            $.post('{{ route('voyager.slider-home.order') }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                toastr.success("Pengurutan Slider Berhasil");
            });
        });
    });
    
</script>
@stop