@extends('template')

@section('main') 
<div id="siswa">
	<h2>Detail Siswa</h2>
	<table class="table table-striped">
		<tr>
			<th>NISN</th>
			<td>{{ $siswa->nim }}</td>
		</tr>
		<tr>
			<th>NAMA MAHASISWA</th>
			<td>{{ $siswa->nama_mahasiswa }}</td>
		</tr>
		<tr>
			<th>JURUSAN</th>
			<td>{{ $siswa->jurusan->nama_jurusan }}</td>
		</tr>	
	</table>
</div>
@stop

@section('footer')
	@include('footer')
@stop