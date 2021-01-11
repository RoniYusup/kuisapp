@extends('template')

@section('pageTitle')
	Kuis
@endsection


@section('main')

		
<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="panel-title"><strong>Daftar Kuis</strong></span>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:5%">#</th>
								<th>Nama Kuis</th>
								<th>Jumlah Soal</th>								
								<th>Waktu (menit)</th>								
								<th style="text-align:center;">Kerjakan</th>								
							</tr>
						</thead>
						<tbody>
							@if($kuis->count())
								@foreach($kuis as $ku)
								<tr id="rowKuis_{{$ku->id}}">
									<td></td>
									<td>
										{{ $ku->title }}
									</td>
									<td> {{ $ku->soal->count() }}</td>
									<td> {{ $ku->timer }}</td>
									<td style="text-align:center;">
										<a href="{{ URL::to('viewKuis/'.$ku->id) }}" class="btn btn-sm btn-info" title="Kerjakan {{ $ku->title }}">
											<i class="glyphicon glyphicon-edit"></i>
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
					<!-- Pagination links -->
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
