@extends('template')

@section('main') 
<div id="dosen">
	<h2>Detail Dosen</h2>
	<table class="table table-striped">
		<tr>
			<th>NIP</th>
			<td>{{ $dosen->nip }}</td>
		</tr>
		<tr>
			<th>Nama Dosen</th>
			<td>{{ $dosen->nama_dosen }}</td>
		</tr>
		<tr>
			<th>Matakuliah</th>
			<td>
				@foreach($dosen->matakuliah as $item)
				<span>{{ $item->nama_matakuliah }}
				</span>,
				@endforeach
			</td>
		</tr>	
	</table>
</div>
@stop

@section('footer')
	@include('footer')
@stop