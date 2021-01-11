@extends('template')
@section('main')
	<div id="dosen">
		<h2>Edit Dosen</h2>

		{!! Form::model($dosen, ['method' => 'PATCH', 'action' => 
		['DosenController@update', $dosen->id]]) !!}
					@include('dosen.form',['submitButtonText' => 'Update'])
		{!! form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop