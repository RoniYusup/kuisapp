@extends('template')
@section('main')
	<div id="siswa">
		<h2>Edit Mahasiswa</h2>

		{!! Form::model($siswa, ['method' => 'PATCH', 'action' => 
		['SiswaController@update', $siswa->id]]) !!}
					@include('siswa.form',['submitButtonText' => 'Update'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop