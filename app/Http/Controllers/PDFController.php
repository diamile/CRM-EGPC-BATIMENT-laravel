<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\User;
use App\Devis;
use DB;
use App\Devis_ligne;
class PDFController extends Controller
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

    public function generatePDF($id)
    {
       
        $users = User::find($id);
        //$users=DB::table('users')->where('id','=',$id);
      
        //dd($users);

        $pdf = PDF::loadView('pdf/proforma', compact('users'));


       return $pdf->download('devis'.'-'.$users->id.'.pdf');
   }

   public function getDevisPdf($id){

    $devis_lignes = DB::table('devis_lignes')->where('id_devis','=',$id)->get();

    $arr = [];
    $total = 0;
    foreach($devis_lignes as $item){
     $total +=$item->prix_total;
    }

    
     $pdf = PDF::loadView('pdf/devis', compact('devis_lignes','total'));

     return $pdf->download('devis'.'numero'.$id.'.pdf');

   }

}
