<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestataire;
use Illuminate\Support\Facades\Session;
use DB;


class prestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestataires = Prestataire::paginate(6);
        $type_prestataires = ["electricite","faux plafond","peinture","carrelage","plomberie"];
        return view('admin.list-prestataire',compact('prestataires','type_prestataires'));
    }


    public function search(Request $request){
        $prestataires = DB::table('prestataires')->where('name',"=",$request->slug)->paginate(6);
        $type_prestataires = ["electricite","faux plafond","peinture","carrelage","plomberie"];

        return view('admin.list-prestataire',compact('prestataires'));
  
    }

    public function filterPrestataire($data){
        
        $prestataires = DB::table('prestataires')->where('type_prestataire',"=",$data)->paginate(6);
        $type_prestataires = ["electricite","faux plafond","peinture","carrelage","plomberie"];


        return view('admin.list-prestataire',compact('prestataires','type_prestataires'));
        
  
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-prestataire');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestataire = new Prestataire;

        $prestataire->name = $request->input('name');
        $prestataire->type_prestataire = $request->input('type_prestataire');
        $prestataire->telephone = $request->input('phone');
        $prestataire->adresse = $request->input('adresse');

        $prestataire->save();

        Session::flash('flash_message', 'Un nouveau prestataire a été crée');

        return redirect('prestataire-create');


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
