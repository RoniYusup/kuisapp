@extends('template')

@section('main') 
<div id="dosen">

	<h2>Dosen</h2>
	@include('_partial.flash_message')
	@if (!empty($dosen_list))
		<table class="table">
			<thead>
				<th>NIP</th>
				<th>Nama Dosen</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php foreach ($dosen_list as $dosen) : ?> 
					<tr>
						<td>{{ $dosen->nip }}</td>
						<td>{{ $dosen->nama_dosen }}</td>
						<td>
							<div class="box-button"> 
							{{ link_to('dosen/' . $dosen->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
							{{ link_to('dosen/' . $dosen->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
							{!! Form::open(['method' => 'DELETE', 'action' => ['DosenController@destroy', $dosen->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							</div>

						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	@else
		<p> Tidak ada data dosen. </p>

	@endif
<div class="table-nav"> 
	<div class="jumlah-data">
		<strong>Jumlah dosen : {{ $jumlah_dosen }}</strong>
	</div>
	<div class="paging"> {{ $dosen_list->links() }}
	</div>
</div>

<div class="tombol-nav">
		<div>
			<a href="dosen/create" class="btn btn-primary">Tambah Dosen</a>
		</div>
	</div>


</div>
@stop

@section('footer')
	@include('footer')
@stop