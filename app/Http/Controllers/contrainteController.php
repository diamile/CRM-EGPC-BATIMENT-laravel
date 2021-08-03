<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Devis;
use App\User;
use DB;
use App\Suivi;
use App\Projet;
use App\Contrainte;

class contrainteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $contraintes = Contrainte::with('projet')->paginate(6);
       return view('client.contrainte',compact('contraintes'));
    }


    public function test(Request $request){
        
        
        $contraintes = Contrainte::where('type_contrainte',$request->slug)->get();
        
        return view('client.contrainte',compact('contraintes'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contraintes = ["materiel","eau","transport","maladie","stockage-brique","stockage-ciment","autorisation de construction"];
        $projets = Projet::all();
        
        
        return view('client.create-contrainte',compact('contraintes','projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $users= User::where('id', Auth::id())->get();
        $contrainte = new Contrainte;

        $contrainte->id_projet = $request->id_projet;
        $contrainte->type_contrainte = $request->type_contrainte;
        $contrainte->titre = $request->titre;
        $contrainte->description =  $request->description;
        $contrainte->user = $users[0]->name;
        $contrainte->save();


        $projet = DB::table('projets')->where('id',$request->id_projet)->pluck('name');

        $score = DB::table('projets')->where('id',$request->id_projet)->pluck('score');

        

        $gain = -2;

        $total = $score[0] + $gain;
        DB::table('projets')->where('id',$request->id_projet)->update(['score'=>$total]);


       DB::table('suivis')->insert(['user' =>$users[0]->name, 'action' => $users[0]->name." "."vient de creer un nouveau contrainte pour le "." ".$projet[0]." "."ce contrainte est lié au probléme de"." ".$request->type_contrainte]);

        Session::flash('flash_message', 'Une nouvelle contrainte a été insérée avec succés');

       return redirect('/create-contrainte');


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
      
        DB::table('contraintes')->where('id', $id)->update(['is_valid' => "1"]);

        $status = DB::table('contraintes')->where('id',$id)->pluck('is_valid');
   
    
        if($status[0] == "1"){
            DB::table('contraintes')->where('id', $id)->update(['etat' => "valide"]);

           Session::flash('flash_message', 'Le contrainte  numero'.' '.$id.' '. 'vient d\'étre validé .');
   
        }
   
        
        return redirect('list-contraintes');
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
