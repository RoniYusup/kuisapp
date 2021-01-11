@if (isset($siswa))
		{!! Form::hidden('id', $siswa->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('nim') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('nim', 'NIM:', ['class' => 'control-label']) !!}
	{!! Form::text('nim', null, ['class' => 'form-control']) !!}	
	@if ($errors->has('nim'))
	<span class="help-block"> {{ $errors->first('nim') }}  </span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_mahasiswa') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('nama_mahasiswa', 'Nama Mahasiswa:', ['class' => 'control-label']) !!}
	{!! Form::text('nama_mahasiswa', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_mahasiswa'))
	<span class="help-block"> {{ $errors->first('nama_mahasiswa') }}  </span>
	@endif
</div>


@if ($errors->any())
<div class="form-group {{ $errors->has('id_jurusan') ? 'has-error' : 'has-succes'}} " >	
@else 
<div class="form-group">
@endif
	{!! Form::label('id_jurusan', 'Jurusan:', ['class' => 'control-label']) !!}
	@if(count($list_jurusan) > 0)
		{!! Form::select('id_jurusan', $list_jurusan , null, ['class' => 'form-control','id' => 'id_jurusan' , 'placeholder' => 'Pilih Jurusan']) !!}
	@else
		<p>Tidak Ada pilihan jurusan buat dulu ya !!</p>
	@endif
	@if ($errors->has('id_jurusan'))
	<span class="help-block"> {{ $errors->first('id_jurusan') }}  </span>
	@endif
</div>


<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>