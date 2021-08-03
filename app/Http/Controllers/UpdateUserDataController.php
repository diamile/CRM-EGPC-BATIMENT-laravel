<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

/*
    |--------------------------------------------------------------------------------------------------
    | Création UpdateUserDataController qui me permet gerer mes utilisateurs (creer,supprimer,modifier)
    |---------------------------------------------------------------------------------------------------
   */
class UpdateUserDataController extends Controller
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

     /*
    |---------------------------------------------------------------------------------------------------------
    | Création de ma fonction create qui me permet d'afficher le formulaire de creation de nouveaux utiisateur
    |---------------------------------------------------------------------------------------------------------
   */
    public function create()
    {
        $title = "creation d'une nouvelle utilisateur";
        
        return view('admin.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /*
    |-----------------------------------------------------------------------------------------------------------------------------------
    | Création de ma fonction store qui permet de recuperer les donées tapées par l'utilisateur et de les inserer dans la base de donnée
    |------------------------------------------------------------------------------------------------------------------------------------
   */
    public function store(Request $request)
    {
        

         //validation des champs
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            
        );


         $validator = Validator::make(Input::all(), $rules);

         //creation d'une instannce de User
         $newUser= new User;

         $newUser->name = $request->input('name');
         $newUser->email = $request->input('email');
         
         $newUser->password= Hash::make($request->input('password'));

         $newUser->lastName = $request->input('lastName');
         $newUser->phone = $request->input('tel');
         $newUser->postale = $request->input('postale');

         $newUser->ville = $request->input('city');
         $newUser->adresse = $request->input('address');
         
         //enregistrement des données dans la base  de donnée
         $newUser->save();

         Session::flash('flash_message', 'Nouveau Utilisateur crée avec succés!');
      
         return redirect('home');
      


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
       //creation d'une instance de user et recuperation des infos corres^pondant à l'id cliqué

        $users = User::where('id', $id)->get();
        $statut = ['Aministrateur', 'Client'];
       
        return view('admin/user_data', compact('users','statut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


      /*
    |-----------------------------------------------------------------------------------------------------------------------------------
    | Création de ma fonction update qui recopie les nouvelles données tapés par l'utilisateur et de les inserer dans la base de donnée
    |------------------------------------------------------------------------------------------------------------------------------------
   */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'address'=> 'required|string|max:255',
            
        );

       

        $validator = Validator::make(Input::all(), $rules);

    
            
            //recuperation des nouvelles données apres modification

            $user = User::find($id);

            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->password       = Input::get('password');
            $user->postale       = Input::get('postale');
            $user->phone      = Input::get('tel');
            $user->ville       = Input::get('city');

           
            $user->save();

            Session::flash('flash_message', 'Vos données  ont été bien modifié');
         
            return redirect('/home');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

       /*
    |--------------------------------------------------------------------------------------------------------
    | Création de ma fonction delete qui permet de supprimer l'utilisateur qui correspond à l'id en question
    |--------------------------------------------------------------------------------------------------------
   */
    public function destroy($id)
    {
        $deletedUser= User::findOrFail($id);

        $deletedUser->delete();
 
        Session::flash('danger_message', 'Utilisateur supprimée avec succés!');
 
        return redirect('/home');
    }
}
