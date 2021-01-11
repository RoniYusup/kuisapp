@extends('template')
@section('main')
	<div id="matakuliah">
		<h2>Tambah Matakuliah</h2>
		{!! Form::open(['url' => 'matakuliah']) !!}
					@include('matakuliah.form',['submitButtonText' => 'Simpan'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')	
@stop