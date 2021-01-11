<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kuis;
use App\Soal;

class SoalController extends Controller
{

     public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'soal'=>'required|min:5',
            'opsiA'=>'required|different:opsiB,opsiC,opsiD',
            'opsiB'=>'required|different:opsiA,opsiC,opsiD',
            'opsiC'=>'required|different:opsiA,opsiB,opsiD',
            'opsiD'=>'required|different:opsiA,opsiB,opsiC',
            'opsiBenar'=>'required',
            'kuis_id'=>'required|integer',

        ]);
        $kuis = Kuis::find($request->kuis_id);

        Soal::create($request->all());
        return Redirect('kuis/'.$request->kuis_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createSoal($idK){

        $kuis_id = $idK;
        $kuis = Kuis::findOrFail($kuis_id);

        return View('soal.create')->with('kuis',$kuis);
    }


    public function hapusSoal(Request $request){

        if($request->ajax()){

            $soal = Soal::findOrFail($request->id);
            $soal->delete();
            return response('deleted');

        }
    }

}
