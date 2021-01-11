<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use Validator;
use App\Matakuliah;
use Session;

class DosenController extends Controller
{
	 public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
    	$dosen_list = Dosen::orderBy('nip', 'asc') ->paginate(10); //menampilkan data dosen berdasarkan nip//
    	$jumlah_dosen = $dosen_list->count();
    	return view('dosen.index', compact('dosen_list','jumlah_dosen'));
    }
    public function show($id) {
			$dosen   = Dosen::findOrFail($id);
		return view('dosen.show', compact('dosen'));
	} 

    public function create(){
    	$list_matakuliah = Matakuliah::pluck('nama_matakuliah', 'id');
		return view('dosen.create', compact('list_matakuliah'));
	}

	public function store(Request $request){
		$input = $request->all();

		$validator = Validator::make($input, [
					'nip'		=> 'required|string|size:10|unique:dosen,nip',
					'nama_dosen'		=> 'required|string|max:30',
					]);
		if ($validator->fails()) {
			return redirect('dosen/create')
					->withInput() 
					->withErrors($validator);
		}
		$dosen = Dosen::create($input);

		$dosen->matakuliah()->attach($request->input('matakuliah_dosen'));
        Session::flash('flash_message', 'Data Dosen berhasil disimpan.');
		return redirect('dosen');
	}

	public function edit($id){
		$dosen = Dosen::findOrFail($id);
    	$list_matakuliah = Matakuliah::pluck('nama_matakuliah', 'id');

		return view('dosen.edit', compact('dosen', 'list_matakuliah'));
	}

	public function update($id, Request $request) {
		$dosen = Dosen::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
					'nip'		=> 'required|string|size:10|
					unique:dosen,nip,'. $request->input('id'),
					'nama_dosen'		=> 'required|string|max:30',
				
					]);
		if ($validator->fails()) {
			return redirect('dosen/'. $id . '/edit')
					->withInput() 
					->withErrors($validator);
		}
		$dosen->update($request->all());

		$dosen->matakuliah()->sync($request->input('matakuliah_dosen')); 
        Session::flash('flash_message', 'Data dosen berhasil update.');
		return redirect('dosen');
	}

	public function destroy($id) {
		$dosen = Dosen::findOrFail($id);
		$dosen->delete();
        Session::flash('flash_message', 'Data Dosen berhasil dihapus.');
		return redirect('dosen');
	}


}
