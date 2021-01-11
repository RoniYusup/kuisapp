<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matakuliah;
use Validator;
use Session;

class MatakuliahController extends Controller
{

	 public function __construct() {
        $this->middleware('auth');
    }
    
   public function index() {
    	$matakuliah_list = Matakuliah::orderBy('kode_matakuliah', 'asc') ->paginate(10); //menampilkan data dosen berdasarkan kode//
    	$jumlah_matakuliah = $matakuliah_list->count();
    	return view('matakuliah.index', compact('matakuliah_list','jumlah_matakuliah'));
    }
    public function show($id) {
			$matakuliah   = Matakuliah::findOrFail($id);
		return view('matakuliah.show', compact('matakuliah'));
	}

    public function create(){
    	$list_matakuliah = Matakuliah::pluck('nama_matakuliah', 'id');
		return view('matakuliah.create', compact('list_matakuliah'));
	}

	public function store(Request $request){
		$input = $request->all();

		$validator = Validator::make($input, [
					'kode_matakuliah'		=> 'required|string|size:5|unique:matakuliah,kode_matakuliah',
					'nama_matakuliah'		=> 'required|string|max:200|unique:matakuliah,nama_matakuliah',
					]);
		if ($validator->fails()) {
			return redirect('matakuliah/create')
					->withInput() 
					->withErrors($validator);
		}
		$matakuliah = Matakuliah::create($input);
		Session::flash('flash_message', 'Data matakuliah berhasil disimpan.');
		return redirect('matakuliah');
	}

	public function edit($id){
		$matakuliah = Matakuliah::findOrFail($id);
		return view('matakuliah.edit', compact('matakuliah'));
	}

	public function update($id, Request $request) {
		$matakuliah = Matakuliah::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
					'kode_matakuliah'		=> 'required|string|size:5|
					unique:dosen,nip,'. $request->input('id'),
					'nama_matakuliah'		=> 'required|string|max:200|unique:matakuliah,nama_matakuliah',
				
					]);
		if ($validator->fails()) {
			return redirect('matakuliah/'. $id . '/edit')
					->withInput() 
					->withErrors($validator);
		}
		$matakuliah->update($request->all());
		Session::flash('flash_message', 'Data matakuliah berhasil diupdate.');
		return redirect('matakuliah');
	}

	public function destroy($id) {
		$matakuliah = Matakuliah::findOrFail($id);
		$matakuliah->delete();
		Session::flash('flash_message', 'Data matakuliah berhasil dihapus.');
		return redirect('matakuliah');
	}
}
