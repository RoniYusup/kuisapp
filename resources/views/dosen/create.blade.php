@extends('template')
@section('main')
	<div id="dosen">
		<h2>Tambah Dosen</h2>
		{!! Form::open(['url' => 'dosen']) !!}
					@include('dosen.form',['submitButtonText' => 'Simpan'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')	
@stop