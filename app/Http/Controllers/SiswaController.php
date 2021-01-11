<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Validator;
use App\Jurusan;
use Session;

class SiswaController extends Controller
{

	 public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
    	$siswa_list = Siswa::orderBy('nim', 'asc') ->paginate(10); //menampilkan data siswa berdasarkan nama//
    	$jumlah_siswa = $siswa_list->count();
    	return view('siswa.index', compact('siswa_list','jumlah_siswa'));
    }
    public function show($id) {
			$siswa   = Siswa::findOrFail($id);
		return view('siswa.show', compact('siswa'));
	} 

    public function create(){
    	$list_jurusan = Jurusan::pluck('nama_jurusan', 'id');
		return view('siswa.create', compact('list_jurusan'));
	}

	public function store(Request $request){
		$input = $request->all();

		$validator = Validator::make($input, [
					'nim'		=> 'required|string|size:9|unique:siswa,nim',
					'nama_mahasiswa'		=> 'required|string|max:30',
					'id_jurusan'		=> 'required',
					
					]);
		if ($validator->fails()) {
			return redirect('siswa/create')
					->withInput() 
					->withErrors($validator);
		}
		Siswa::create($input);
		Session::flash('flash_message', 'Data Mahasiswa berhasil disimpan.');

		return redirect('siswa');
	}

	public function edit($id){
		$siswa = Siswa::findOrFail($id);
    	$list_jurusan = Jurusan::pluck('nama_jurusan', 'id');

		return view('siswa.edit', compact('siswa', 'list_jurusan'));
	}

	public function update($id, Request $request) {
		$siswa = Siswa::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
					'nim'		=> 'required|string|size:9|
					unique:siswa,nim,'. $request->input('id'),
					'nama_mahasiswa'		=> 'required|string|max:30',
					'id_jurusan'		=> 'required',
					]);
		if ($validator->fails()) {
			return redirect('siswa/'. $id . '/edit')
					->withInput() 
					->withErrors($validator);
		}
		$siswa->update($request->all());
		Session::flash('flash_message', 'Data Mahasiswa berhasil diupdate.');
		return redirect('siswa');
	}

	public function destroy($id) {
		$siswa = Siswa::findOrFail($id);
		$siswa->delete();
        Session::flash('flash_message', 'Data  berhasil dihapus.');
		return redirect('siswa');
	}

	public function cari(Request $request)
	{
		$kata_kunci		= $request->input('kata_kunci');
		$query			= Siswa::where('nim', 'LIKE', '%' . $kata_kunci . '%');
		$siswa_list		= $query->paginate(2);
		$pagination		= $siswa_list->appends($request->except('page'));
		$jumlah_siswa	= $siswa_list->total();
		return view('siswa.index', compact('siswa_list', 'kata_kunci', 'pagination', 'jumlah_siswa'));
	}


}
