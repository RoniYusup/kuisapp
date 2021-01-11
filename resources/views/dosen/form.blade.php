@if (isset($dosen))
		{!! Form::hidden('id', $dosen->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('nip') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('nip', 'NIP:', ['class' => 'control-label']) !!}
	{!! Form::text('nip', null, ['class' => 'form-control']) !!}	
	@if ($errors->has('nip'))
	<span class="help-block"> {{ $errors->first('nip') }}  </span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_dosen') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('nama_dosen', 'Nama :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_dosen', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_dosen'))
	<span class="help-block"> {{ $errors->first('nama_dosen') }}  </span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('matakuliah_dosen') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('matakuliah_dosen', 'Matakuliah:', ['class' => 'control-label']) !!}
	@if(count($list_matakuliah) > 0)
		@foreach($list_matakuliah as $key => $value)
		<div class="checkbox">
		<label> {!! Form::checkbox('matakuliah_dosen[]', $key, null) !!} 
		 {{ $value }} </label>
		</div>
		@endforeach
	@else
		<p>Tidak Ada pilihan matakuliah buat dulu ya !!</p>
	@endif
</div>


<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>