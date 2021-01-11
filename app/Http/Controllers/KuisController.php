<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kuis;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kuis = Kuis::paginate(10);
        $kuis->setPath('');
        
        return View('kuis.index')->with('kuis', $kuis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('kuis.create');
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

                'title'=>'required|unique:kuis,title|min:5',
                'objectives'=>'required|min:5',
                'timer'=>'required|integer'
        ]);

        Kuis::create($request->all());
        return redirect('kuis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kuis = Kuis::findOrFail($id);
        $soal = $kuis->soal;
        return View('kuis.show')->with('kuis', $kuis)->with('soal', $soal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id);
        return View('kuis.edit')->with('kuis', $kuis);
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
        $this->validate($request,
            [
                'title' => 'required|unique:kuis,title,'.$id.'',
                'objectives'=>'required|min:5',
                'timer' =>'required|integer',
            ]
        );
        $kelas = Kuis::whereId($id)->first();
        $kelas->fill($request->input())->save();
        return Redirect('kuis');
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

        public function hapusKuis(Request $request){                //delete kuis via ajax.
        if($request->ajax()){
            
            $kuis = Kuis::findOrFail($request->id);
            $countSoal = $kuis->soal->count();
            if($countSoal > 0){                         //there at least 1 soal, the quiz should not be able to be deleted.
                
                return response("$kuis->title tidak bisa dihapus, karena terdapat soal dalam kuis");
            }
            else{

                $kuis->delete();
                return response("deleted");
            }
        }
        else{
            return response("not ajax");
        }
    }
}
