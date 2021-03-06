@extends('template')


@section('pageTitle')
	Kuis
@endsection



@section('main')
	
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Buat Kuis Baru
				</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'kuis.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
					<div class="form-group {{$errors->has('title')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Nama kuis</label>
						<div class="col-md-6">
							{!! Form::text('title',null,['class'=>'form-control']) !!}
							{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="form-group {{$errors->has('objectives')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Keterangan</label>
						<div class="col-md-8">
							{!! Form::textarea('objectives',null,['class'=>'form-control']) !!}
							{!! $errors->first('objectives', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="form-group {{$errors->has('timer')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Waktu (menit)</label>
						<div class="col-md-4">
							{!! Form::text('timer',null,['class'=>'form-control']) !!}
							{!! $errors->first('timer', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary">
								<i class="glyphicon glyphicon-save"></i>&nbsp;Simpan
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	
@section('necessaryScripts')
	<script type="text/javascript">
		

	</script>
@endsection
@stop

@section('footer')
	@include('footer')
@stop