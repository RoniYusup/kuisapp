@extends('template')
@section('main')
	<div id="siswa">
		<h2>Tambah Mahasiswa</h2>
		{!! Form::open(['url' => 'siswa']) !!}
					@include('siswa.form',['submitButtonText' => 'Simpan'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')	
@stop