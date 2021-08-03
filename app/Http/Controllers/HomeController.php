<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Devis;
use App\User;
use DB;
use App\Suivi;
use App\Projet;
use App\Travaux;
use App\Decaissement;

/*
    |------------------------------------------------------------------------------------------
    | Création HomeController qui me permet d'aficher la page d'accueil (page d'administartion)
    |-------------------------------------------------------------------------------------------
   */

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /*
    |---------------------------------------------------------------------------------------------------------
    | Création des requétes grace à mes models et insertion des variables à la vue blade via ma fonction compact
    |----------------------------------------------------------------------------------------------------------
   */
        $users=DB::table('users')->orderBy('created_at','DESC')->paginate(6);
        $user = User::where('id', Auth::id())->get();

        
        $statut = ['Aministrateur', 'Client'];
        return view('admin.home',compact('users','statut','user'));
    }


    public function dashboard(){
        $devis = Devis::all();
        $projet = Projet::all();
        $users = User::all();
        $decaissements = Decaissement::all();
        $suivis = Suivi::paginate(6);

        return view('admin.dashboard',compact('devis','projet','users','decaissements','suivis'));
    }
}
