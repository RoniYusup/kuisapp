@extends('template')

@section('main') 
<div id="matakuliah">

	<h2>Matakuliah</h2>
	@include('_partial.flash_message')
	
	@if (!empty($matakuliah_list))
		<table class="table">
			<thead>
				<th>Kode Matakuliah</th>
				<th>Nama Matakuliah</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php foreach ($matakuliah_list as $matakuliah) : ?> 
					<tr>
						<td>{{ $matakuliah->kode_matakuliah }}</td>
						<td>{{ $matakuliah->nama_matakuliah }}</td>
						<td>
							<div class="box-button"> 
							{{ link_to('matakuliah/' . $matakuliah->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
							{!! Form::open(['method' => 'DELETE', 'action' => ['MatakuliahController@destroy', $matakuliah->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							</div>

						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	@else
		<p> Tidak ada data Matakuliah. </p>

	@endif
<div class="table-nav"> 
	<div class="jumlah-data">
		<strong>Jumlah matakuliah : {{ $jumlah_matakuliah }}</strong>
	</div>
	<div class="paging"> {{ $matakuliah_list->links() }}
	</div>
</div>

<div class="tombol-nav">
		<div>
			<a href="matakuliah/create" class="btn btn-primary">Tambah Matakuliah</a>
		</div>
	</div>


</div>
@stop

@section('footer')
	@include('footer')
@stop