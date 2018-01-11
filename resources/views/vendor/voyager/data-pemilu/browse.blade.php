@extends('voyager::master')
@section('page_title', 'Data Pemilu')

@section('page_header')
<div class="container-fluid">
	<h1 class="page-title">
		<i class="voyager-list"></i> Data Pemilu
	</h1>
	<a href="{{ route('voyager.data-pemilu.create') }}" class="btn btn-success btn-add-new">
		<i class="voyager-plus"></i> <span>TAMBAH</span>
	</a>

</div>
@stop
@section('content')
<div class="page-content browse container-fluid">
	@include('voyager::alerts')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-bordered">
				<div class="panel-body">

					<div class="table-responsive">
						<table id="dataTable" class="table table-hover">
							<thead>
								<tr role="row">
									<th style="width: 0px"></th>
									<th>jenis Pemilu</th>
									<th>Nama</th>
									<th>Tahun</th>
									<th>Jumlah Pemilih</th>
									<th>Tanggal Input</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($dataTypeContent as $data)
								<tr>
									<td>
										<input type="checkbox" name="row_id" id="checkbox_{{ $data->id }}" value="{{ $data->id }}">
									</td>
									<td>{{ $data->jenis }}</td>
									<td>{{ $data->nama }}</td>
									<td >{{ $data->tahun }}</td>
									<td style="text-align: right;">{{ $data->jumlah_dps }}</td>
									<td >{{ $data->created_at }}</td>
									<td class="no-sort no-click" id="bread-actions">
                                            @can('delete', $data)
                                                <a href="javascript:;" title="{{ __('voyager.generic.delete') }}" class="btn btn-sm btn-danger pull-right delete" data-id="{{ $data->{$data->getKeyName()} }}" id="delete-{{ $data->{$data->getKeyName()} }}">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager.generic.delete') }}</span>
                                                </a>
                                            @endcan
                                            @can('edit', $data)
                                                <a href="{{ route('voyager.data-pemilu.edit', $data->{$data->getKeyName()}) }}" title="{{ __('voyager.generic.edit') }}" class="btn btn-sm btn-primary pull-right edit">
                                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">{{ __('voyager.generic.edit') }}</span>
                                                </a>
                                            @endcan
                                            @can('read', $data)
                                                <a href="{{ route('voyager.data-dps.show', $data->{$data->getKeyName()}) }}" title="{{ __('voyager.generic.view') }}" class="btn btn-sm btn-warning pull-right">
                                                    <i class="voyager-people"></i> <span class="hidden-xs hidden-sm">DPS</span>
                                                </a>
                                            @endcan
                                        </td>

								</tr>
								@endforeach
								<!-- <tr>
									<td colspan="" rowspan="" headers=""></td>
									<td colspan="" rowspan="" headers=""></td>
									<td colspan="" rowspan="" headers=""></td>
									<td colspan="" rowspan="" headers=""></td>
									<td colspan="" rowspan="" headers=""></td>
									<td colspan="" rowspan="" headers=""></td>
								</tr> -->
							</tbody>
						</table>

					</div>
				</div>

			</div>

		</div>

	</div>
</div>

{{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager.generic.delete_question') }} data pemilu?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.data-pemilu.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                 value="{{ __('voyager.generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop


@section('css')
@if(config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
<!-- DataTables -->
@if(config('dashboard.data_tables.responsive'))
<script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
@endif
<script>
	$(document).ready(function () {

		var table = $('#dataTable').DataTable({!! json_encode(
			array_merge([
				"order" => [],
				"language" => __('voyager.datatable'),
				],
				config('voyager.dashboard.data_tables', []))
			, true) !!});


	});

	var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });

</script>
@stop