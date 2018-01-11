@extends('voyager::master')
@section('page_title', 'Data DPS')

@section('page_header')
<div class="container-fluid">
	<h1 class="page-title">
		<i class="voyager-list"></i> Data DPS {{ $title_add}}
	</h1>
	<!-- <a href="{{ route('voyager.data-dps.create', $id) }}" class="btn btn-success btn-add-new">
		<i class="voyager-plus"></i> <span>TAMBAH</span>
	</a> -->
		<a href="{{ route('voyager.data-dps.import', $id)}}" class="btn btn-success btn-add-new">
		<i class="voyager-upload"></i> <span>UPLOAD DATA DPS</span>
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
									<th rowspan="2">NO. KK</th>
									<th rowspan="2">NIK</th>
									<th rowspan="2">Nama</th>
									<th rowspan="2">Tempat Lahir</th>
									<th rowspan="2">Tanggal Lahir</th>
									<th rowspan="2">Status Pernikahan</th>
									<th rowspan="2">Jenis Kelamin</th>
									<th colspan= "5">Alamat</th>									
								</tr>
								<tr>
									<th>Jl / Dusun </th>
									<th>RT</th>
									<th>RW</th>
									<th>Kelurahan</th>
									<th>Kecamatan</th>
								</tr>
							</thead>
							<tbody>
								@foreach($dataTypeContent as $data)
								<tr>
									<td>{{ $data->no_kk }}</td>
									<td>{{ $data->nik }}</td>
									<td>{{ $data->nama }}</td>
									<td>{{ $data->tempat_lahir }}</td>
									<td>{{ $data->tanggal_lahir }}</td>
									<td>{{ $data->status_pernikahan }}</td>
									<td>{{ $data->jenis_kelamin }}</td>
									<td>{{ $data->alamat }}</td>
									<td>{{ $data->rt }}</td>
									<td>{{ $data->rw }}</td>
									<td>{{ $data->kelurahan }}</td>
									<td>{{ $data->kecamatan }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>

			</div>

		</div>

	</div>
</div>


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
			array([
				"order" => [],
				"language" => __('voyager.datatable'),
				])
			, true) !!});


	});

</script>
@stop