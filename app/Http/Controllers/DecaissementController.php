<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decaissement;
use PDF;
use DB;
class DecaissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decaissements =  Decaissement::all();
        return view('client.list-decaissement',compact('decaissements'));
    }


    public function Search(Request $request){
        
        $decaissements = Decaissement::where('projet',$request->slug)->get();
        
        return view('client.list-decaissement',compact('decaissements'));
  
    }

    public function validateDecaissement($id){
        DB::table('decaissements')->where('id', $id)->update(['is_valid' => "1"]);
        return redirect('decaissements');
        //add suivi and create decharge
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


    public function decaissementPdf($id){

        $pdf = PDF::loadView('pdf/decaissement', compact('id'));


       return $pdf->download('decaissement'.'-'.$id.'.pdf');

    }



    public function dechargePdf($id){

        $decharge = Decaissement::find($id);
        $pdf = PDF::loadView('pdf/decharge', compact('decharge'));


       return $pdf->download('decharge'.'-'.$id.'.pdf');
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
}
