@if (isset($matakuliah))
		{!! Form::hidden('id', $matakuliah->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('kode_matakuliah') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('kode_matakuliah', 'Kode Matakuliah:', ['class' => 'control-label']) !!}
	{!! Form::text('kode_matakuliah', null, ['class' => 'form-control']) !!}	
	@if ($errors->has('kode_matakuliah'))
	<span class="help-block"> {{ $errors->first('kode_matakuliah') }}  </span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_matakuliah') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('nama_matakuliah', 'Nama Matakuliah :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_matakuliah', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_matakuliah'))
	<span class="help-block"> {{ $errors->first('nama_matakuliah') }}  </span>
	@endif
</div>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>