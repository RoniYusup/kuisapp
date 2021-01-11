@extends('template')

@section('main') 
<div id="siswa">

	<h2>Mahasiswa</h2>
	@include('siswa.form_pencarian')
	@include('_partial.flash_message')
	@if (!empty($siswa_list))
		<table class="table">
			<thead>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Jurusan</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php foreach ($siswa_list as $siswa) : ?> 
					<tr>
						<td>{{ $siswa->nim }}</td>
						<td>{{ $siswa->nama_mahasiswa }}</td>
						<td>{{ $siswa->jurusan->nama_jurusan }}</td>
						<td>
							<div class="box-button"> 
							{{ link_to('siswa/' . $siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
							{{ link_to('siswa/' . $siswa->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
							{!! Form::open(['method' => 'DELETE', 'action' => ['SiswaController@destroy', $siswa->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							</div>

						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	@else
		<p> Tidak ada data sisiwa. </p>

	@endif
<div class="table-nav"> 
	<div class="jumlah-data">
		<strong>Jumlah Mahasiswa : {{ $jumlah_siswa }}</strong>
	</div>
	<div class="paging"> {{ $siswa_list->links() }}
	</div>
</div>

<div class="tombol-nav">
		<div>
			<a href="{{ url('siswa/create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
		</div>
	</div>


</div>
@stop

@section('footer')
	@include('footer')
@stop