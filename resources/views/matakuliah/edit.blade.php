@extends('template')
@section('main')
	<div id="matakuliah">
		<h2>Edit Matakuliah</h2>

		{!! Form::model($matakuliah, ['method' => 'PATCH', 'action' => 
		['MatakuliahController@update', $matakuliah->id]]) !!}
					@include('matakuliah.form',['submitButtonText' => 'Update'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop