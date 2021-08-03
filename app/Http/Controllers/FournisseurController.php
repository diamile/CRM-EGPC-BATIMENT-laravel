<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::paginate(6);
        $type_fournisseurs = ["brique","fer","ciment","bois","sable","beton","aluminium"];
        
        return view('admin.list-fournisseur',compact('fournisseurs','type_fournisseurs'));
    }


    public function search(Request $request){
        $fournisseurs = DB::table('fournisseurs')->where('name',"=",$request->slug)->paginate(6);

        return view('admin.list-fournisseur',compact('fournisseurs'));
  
    }


    public function filter($data){
        
        $fournisseurs = DB::table('fournisseurs')->where('type_fournisseur',"=",$data)->paginate(6);

       

        $type_fournisseurs = ["brique","fer","ciment","bois","sable","beton","aluminium"];
        

        return view('admin.list-fournisseur',compact('fournisseurs','type_fournisseurs'));
  
    }


   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-fournisseur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $fournisseur = new Fournisseur;

       $fournisseur->name = $request->input('name');
       $fournisseur->type_fournisseur = $request->input('type_fournisseur');
       $fournisseur->adresse = $request->input('adresse');
       $fournisseur->telephone = $request->input('phone');


       $fournisseur->save();


       Session::flash('flash_message', 'Un nouveau fournisseur vient d\'étre crée');

       return redirect('/fournisseur-create');
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
