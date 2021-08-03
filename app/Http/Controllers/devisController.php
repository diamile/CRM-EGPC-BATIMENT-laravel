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


class devisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::where('id', Auth::id())->get();

        //Devis::GetInfos($users);

        DB::table('devis')->where('is_valide','=','oui')->update(['etat'=>'valide']);

        //$devis=DB::table('devis')->orderBy('created_at','DESC')->with('projet')->paginate(6);
        //$devise=Devis::find(1);
        $devis = Devis::with('projet')->paginate(6);
        $devisValide = DB::table('devis')->where('is_valide','oui')->get();
        $devisClient = DB::table('devis')->where('type_devis','devis-client')->get();
        $devisFournisseur= DB::table('devis')->where('type_devis','devis-fournisseur')->get();
        $devisInterne= DB::table('devis')->where('type_devis','devis-interne')->get();

        

        $countDevis = Devis::all();
        $countdevisValide = count($devisValide);
        $count = count($countDevis);
        $countDevisClient = count($devisClient);
        $countDevisFournisseur = count($devisFournisseur);
        $countDevisInterne = count($devisInterne);

        $status = ['valide','encours','en_attente'];

        return view('client.list-devis',compact('users','devis','count','countdevisValide','countDevisClient','countDevisFournisseur','countDevisInterne','status'));
    }


    public function Search(Request $request){
        $projet = DB::table('projets')->where('name',"=",$request->slug)->get();

        

        $status = ['valide','encours','en_attente'];

        foreach($projet as $projet){
            $devis=Devis::where('id_projet',$projet->id)->paginate(6);
        }

        
        $users= User::where('id', Auth::id())->get();
        $devisValide = DB::table('devis')->where('is_valide','oui')->get();
        $devisClient = DB::table('devis')->where('type_devis','devis-client')->get();
        $devisFournisseur= DB::table('devis')->where('type_devis','devis-fournisseur')->get();
        $devisInterne= DB::table('devis')->where('type_devis','devis-interne')->get();

        

        $countDevis = Devis::all();
        $countdevisValide = count($devisValide);
        $count = count($countDevis);
        $countDevisClient = count($devisClient);
        $countDevisFournisseur = count($devisFournisseur);
        $countDevisInterne = count($devisInterne);

        

       
        // $hommes=DB::table('devis')->where('categorie_id','=',1)->orderBy('id','DESC')->paginate(6);
  
        // $results=DB::table('produits')->where('categorie_id','=',1);
        // $countMen=$results->count();
  
        // return view('admins.product',['products'=>$hommes],compact('countMen'));

        return view('client.list-devis',compact('users','devis','count','countdevisValide','countDevisClient','countDevisFournisseur','countDevisInterne','status'));
  
    }



    public function filterdevis($data){
        $users= User::where('id', Auth::id())->get();
        $status = ['valide','encours','en_attente'];

      
        $devis = Devis::with('projet')->where('etat','=',$data)->paginate(6);
        //dd($devis);
       // $devis = DB::table('devis')->where('etat',"=",$data)->get();
        $devisValide = DB::table('devis')->where('is_valide','oui')->get();
        $devisClient = DB::table('devis')->where('type_devis','devis-client')->get();
        $devisFournisseur= DB::table('devis')->where('type_devis','devis-fournisseur')->get();
        $devisInterne= DB::table('devis')->where('type_devis','devis-interne')->get();

        

        $countDevis = Devis::all();
        $countdevisValide = count($devisValide);
        $count = count($countDevis);
        $countDevisClient = count($devisClient);
        $countDevisFournisseur = count($devisFournisseur);
        $countDevisInterne = count($devisInterne);


        return view('client.list-devis',compact('users','devis','count','countdevisValide','countDevisClient','countDevisFournisseur','countDevisInterne','status'));
        
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();
        
        return view('client.create-devis',compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $devis= new Devis;

        $devis->id_projet=$request->input('id_projet');

        $devis->resume=$request->input('resume');
        
        $devis->type_devis=$request->input('type_devis');

        
       $devis->save();

       
       //$users = User::where('id', Auth::id())->get();

       $users = DB::table('users')->where('id',Auth::id())->pluck('name');

       $lastdevis = DB::table('devis')->latest()->first();

       $projet = DB::table('projets')->where('id',$lastdevis->id_projet)->pluck('name');


       DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de creer un nouveau devis pour le "." ".$projet[0]]);

       Session::flash('flash_message', 'Le devis a été bien inséré');

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
    
     DB::table('devis')->where('id', $id)->update(['is_valide' => "oui"]);

     $status = DB::table('devis')->where('id',$id)->pluck('is_valide');

    $this->validateDevis($id);

     $this->createContrat($id);
     $this->createDecaissement($id);
     $this->createBondeCommande($id);

    
     if($status[0] == "oui"){

        DB::table('devis')->where('id', $id)->update(['etat' => "valide"]);
       
        Session::flash('flash_message', 'Le devis numero'.' '.$id.' '. 'vient d\'étre validé vous pouvez desormais crée un contrat et faire votre decaissement.');

     }

     
     //$this->createContrat($id);
     //$this->createDecaissement($id);

     return redirect('devis-list');
     


    }


    public function validateDevis($id){

        $users = DB::table('users')->where('id',Auth::id())->pluck('name');
        
       DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de valider le devis numéro ".$id]);
    }

    public function createContrat($data){
         return true;
    }

    public function createBondeCommande($data){
       return true;
    }


    public function createDecaissement($data){
        return true;
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

    public function precedent(){
        return back();
    }
}
