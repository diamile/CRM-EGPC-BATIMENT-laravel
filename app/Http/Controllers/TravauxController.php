<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Travaux;
use App\Decaissement;
use PDF;
class TravauxController extends Controller
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
        //
        $travaux = new Travaux;
        $projet = DB::table('projets')->latest()->first();

        
        
        if($request->is_current_projet == "oui"){
            $travaux->id_projet = $projet->id;
            $travaux->id_projet;
        }else{
           $travaux->id_projet = $request->input('id_projet');
           $travaux->id_projet;
        }

        
        $travaux->type_travaux = $request->input('type_travaux');
        $travaux->type_chantier = $request->input('type_chantier');
        
        $travaux->responsable_chantier = $request->input('responsable');
        $travaux->date_debut = $request->input('date-debut');
        $travaux->date_fin = $request->input('date-fin');

        $travaux->save();

        Session::flash('flash_message', 'Les travaux ont été bien inséré pour ce projet');


        return redirect('/projet-create');

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
        DB::table('travauxes')->where('id', $id)->update(['is_valid' => "1"]);



        // if($travaux->count() == $countValidateTravaux->count()){
        //     DB::table('projets')->where('id','=',$id)->update(['etat'=>'valide']);
           
        // }else{
        //     DB::table('projets')->where('id','=',$id)->update(['etat'=>'encours']);
          
           
        // }


        $id_projet = DB::table('travauxes')->where('id',$id)->pluck('id_projet');

        // $travauxProject = DB::table('travauxes')->where('id_projet',$id_projet)->get();
        // $countValidateTravaux =  DB::table('travauxes')->where('id_projet','=',$id_projet)->where('etat','=','valide')->get(); 

        // if($travauxProject->count() == $countValidateTravaux->count()){
        //     DB::table('projets')->where('id','=',$id_projet)->update(['etat'=>'valide']);
        // }else{
        //     DB::table('projets')->where('id','=',$id_projet)->update(['etat'=>'encours']);

        // }
        //dd($countValidateTravaux);


        $scores = DB::table('projets')->where('id',$id_projet[0])->pluck('score');
        $projet = Projet::where('id',$id_projet[0])->get();
        $gain= 5;

        $total = $scores[0]+$gain;

        DB::table('projets')->where('id',$id_projet[0])->update(['score'=>$total]);

        $this->validateTravaux($id);
        
        $status = DB::table('travauxes')->where('id',$id)->pluck('is_valid');
        


        //$travaux = DB::table('travauxes')->where('id',$id)->get();
        $travaux = Travaux::find($id);
        $this->createDecaissement($id, $travaux);


        if($status[0] == "1"){
            DB::table('travauxes')->where('id', $id)->update(['etat' => "valide"]);
            
            //TODO verifier si tous les travaux liés a un projet sont validé si oui on passe le statut du projet en valide sinon on le laisse en encours

            Session::flash('flash_message', 'Le Travaux numero'.' '.$id.' '. 'vient d\'étre validé vous pouvez desormais faire un decaissement.');
    
         }

        return redirect('projet-details/'.$id_projet[0]);
    }


    public function validateTravaux($id){

        $users = DB::table('users')->where('id',Auth::id())->pluck('name');
       
        
       DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de valider le travaux numéro ".$id]);
    }




    public function createDecaissement($id,$travaux){

        $projet = Projet::where('id',$travaux->id_projet)->get();

       
        DB::table('decaissements')->insert(['contact' =>"Mr MOUSSA SARR", 'adresse' => "DAKAR-SENEGAL","telephone"=>"771967474","montant"=>$travaux->montant,"prestation"=>$travaux->type_travaux,"prestataire"=>$travaux->prestataire,"id_travaux"=>$travaux->id,"projet"=>$projet[0]->name]);

        $users = DB::table('users')->where('id',Auth::id())->pluck('name');



        $data = Decaissement::where('id_travaux',$id)->get();

        

        DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de creer un nouveau decaissement pour le projet numero "." ".$travaux->id_projet." "."pour un montant de ".$travaux->montant]);

    
        $pdf = PDF::loadView('pdf/decaissement', compact('data'));

        return $pdf->download('decaissement'.'numero'.$id.'.pdf');
        
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
