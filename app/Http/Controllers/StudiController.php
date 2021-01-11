<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kuis;
use App\Soal;
use App\User;
class StudiController extends Controller
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
        $kuis = Kuis::paginate(10);
        $kuis->setPath('');
        
        return View('studi.index')->with('kuis', $kuis );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
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


    public function kuis(){

        $kuis = Kuis::paginate(10);
        $kuis->setPath('');
        return View('studi/kuis')->with('kuis', $kuis);
    }

    public function viewKuis($id)
    {
        $kuis = Kuis::findOrFail($id);
        $soal = $kuis->soal;
        return View('studi/viewKuis')
            ->with('kuis', $kuis)
            ->with('soal', $soal);
    }


    public function postAnswer(Request $request){
        

        if($request->ajax()){

            $id_soal = $request->id_soal;
            $answer = $request->answer;
            $soal = Soal::find($id_soal);
            $opsiBenar = $soal->opsiBenar;
            if($answer == $opsiBenar){

                return "answerRight";
            }
            else{

                return "answerWrong";
            }
        }
        else{
            
            return "Hey, seems you are not using ajax, maybe your browser does not support this.";
        }
    }

    public function finishKuis(Request $request){

        $kuis_id = $request->kuis_id;
        $user_id = $request->user_id;
        $skor =$request->skor;
        if($skor == 0){
            $skor = 0;
        }
        $data = [
            'kuis_id'=>$kuis_id,
            'user_id'=>$user_id,
            'skor'=>$skor,
        ];
        \DB::table('kuis_user')->insert($data);
        $messageResult = "";
        if($skor < 60){

            $messageResult = "<i class='glyphicon glyphicon-thumbs-down'></i>&nbsp;Kamu harus lebih banyak belajar";
        }
        else if($skor >=60 && $skor<=80){
            $messageResult = "<i class='glyphicon glyphicon-thumbs-up'></i>&nbsp;Bagus...!";
        }
        else{
            $messageResult = "<i class='glyphicon glyphicon-star-empty'></i>&nbsp;Hebat...!";
            
        }
        return redirect()->back()->with('kuisMessage', "$messageResult , skor kamu $skor");

    }
}
