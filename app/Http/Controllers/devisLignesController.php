<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devis_ligne;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DevisLignesController extends Controller
{
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

        $lastdevis = DB::table('devis')->latest()->first();
        //$lastdevis = DB::table('devis')->orderBy('id','DESC')->first();

        

        $Devis_ligne= new Devis_ligne;

        $Devis_ligne->id_devis= $lastdevis->id;

        $Devis_ligne->quantity=$request->input('quantity');
        
        $Devis_ligne->designation=$request->input('designation');

        $Devis_ligne->prix_unitaire=$request->input('prix_unitaire');

        $Devis_ligne->prix_total=$request->input('prix_unitaire')*$request->input('quantity');



       $Devis_ligne->save();

       $users = DB::table('users')->where('id',Auth::id())->pluck('name');

       DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de creer un nouveau ligne de devis"]);
       

       Session::flash('flash_message', 'Le ligne de devis a été bien inséré');

    return redirect('/create-devis');
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
