@extends('template')

@section('main')


<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar kuis
					<div class="pull-right">
						<a href="{{ URL::to('kuis/create') }}" class="btn btn-xs btn-primary">
							<i class="glyphicon glyphicon-plus"></i>&nbsp;Kuis Baru
						</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:5%">#</th>
								<th>Nama Kuis</th>
								<th>Jumlah Soal</th>								
								<th>Waktu (menit)</th>								
								<th style="text-align:center;">Aksi</th>								
							</tr>
						</thead>
						<tbody>
							@if($kuis->count())
								@foreach($kuis as $ku)
								<tr id="rowKuis_{{$ku->id}}">
									<td></td>
									<td>
										<a href="{{ URL::to('kuis/'.$ku->id)}}" title="klik link untuk buat soal {{ $ku->title }}">{{ $ku->title }}</a>
									</td>
									<td> {{ $ku->soal->count() }}</td>
									<td> {{ $ku->timer }}</td>
									<td style="text-align:center;">
										<a href="{{ URL::to('kuis/'.$ku->id.'/edit') }}" class="btn btn-sm btn-info" title="Klik untuk Edit kuis {{ $ku->title }}">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a href="#" class="btn btn-sm btn-danger" title="klik untuk Hapus kuis {{ $ku->title }}" onClick="deleteKuis( {{$ku->id}} ); return false">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
									</td>
									
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">Belum ada kuis terdaftar,  silahkan buat dulu</td>
								</tr>
							@endif
						</tbody>
					</table>
					<!-- Pagination link -->
					{!! $kuis->render() !!}
				</div>
			</div>
		</div>
	</div>

	@section('necessaryScripts')
	<script type="text/javascript">
		
		function deleteKuis(id){
			var  idKuis = id;
			var dataDelete = 'id='+idKuis;
			
			var conf = confirm('Yakin mau menghapus kuis ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusKuis') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							$('#rowKuis_'+idKuis).fadeOut();
						}
						else{
							alert(response);
						}
					}

				});
			}
			return false;
		}

	</script>
@endsection

	@stop

@section('footer')
	@include('footer')
@stop

