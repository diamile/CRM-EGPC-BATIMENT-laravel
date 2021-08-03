<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Travaux;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('id', Auth::id())->get();
        $projets =DB::table('projets')->orderBy('created_at','DESC')->paginate(6);

        $projetsAttente = count(DB::table('projets')->where('etat','en_attente')->get());

        $projetsGrosOeuvre = count(DB::table('projets')->where('type_projet','Gros oeuvre')->get());

        $projetSecondOeuvre = count(DB::table('projets')->where('type_projet','Second oeuvre')->get());

        $projetValid = count(DB::table('projets')->where('is_valid','0')->get());

        $allProjets = count(Projet::all());

        

        return view('admin.projet',compact('users','projets','allProjets','projetValid','projetSecondOeuvre','projetsGrosOeuvre','projetsAttente'));
    }


    public function timeline($id){
        $projet = Projet::find($id);
        $travaux = DB::table('travauxes')->where('id_projet',$id)->get();

        //dd($travaux);

        return view('client.timeline',compact('projet','travaux'));
    }




    public function Search(Request $request){
        //$projet = DB::table('projets')->where('name',"=",$request->slug)->get();

        $projets = Projet::where('name',$request->slug)->paginate(6);

        

      

        
        $users = User::where('id', Auth::id())->get();
        //$projets =DB::table('projets')->orderBy('created_at','DESC')->paginate(6);

        $projetsAttente = count(DB::table('projets')->where('etat','en_attente')->get());

        $projetsGrosOeuvre = count(DB::table('projets')->where('type_projet','Gros oeuvre')->get());

        $projetSecondOeuvre = count(DB::table('projets')->where('type_projet','Second oeuvre')->get());

        $projetValid = count(DB::table('projets')->where('is_valid','0')->get());

        $allProjets = count(Projet::all());

        

       
        // $hommes=DB::table('devis')->where('categorie_id','=',1)->orderBy('id','DESC')->paginate(6);
  
        // $results=DB::table('produits')->where('categorie_id','=',1);
        // $countMen=$results->count();
  
        // return view('admins.product',['products'=>$hommes],compact('countMen'));

        return view('admin.projet',compact('users','projets','allProjets','projetValid','projetSecondOeuvre','projetsGrosOeuvre','projetsAttente'));
  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();
        return view('admin.create-projet',compact('projets'));
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
       

        $projet= new Projet;
        $projet->name=$request->input('name');
        $projet->type_projet = $request->input('type_projet');
        
        $projet->responsable = $request->input('responsable');
        $projet->adresse = $request->input('adresse');
        $projet->phone = $request->input('phone');
        $projet->ville = $request->input('ville');

        $projet->save();

        $users = DB::table('users')->where('id',Auth::id())->pluck('name');

        DB::table('suivis')->insert(['user' =>$users[0], 'action' => $users[0]." "."vient de creer un nouveau projet"]);
        
 

        Session::flash('flash_message', 'Un nouveau projet a été inséré');

        return redirect('/projet-create');



        //$projet->name       = Input::get('name');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet= Projet::find($id);

      

        $travaux = DB::table('travauxes')->where('id_projet','=',$id)->get();

        $countValidateTravaux =  DB::table('travauxes')->where('id_projet','=',$id)->where('etat','=','valide')->get();

       

        if($travaux->count() == $countValidateTravaux->count()){
            DB::table('projets')->where('id','=',$id)->update(['etat'=>'valide']);
           
        }else{
            DB::table('projets')->where('id','=',$id)->update(['etat'=>'encours']);
          
        }

      
        return view('client.project-details',compact('travaux','projet'));
        
        //dd($travaux);
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
