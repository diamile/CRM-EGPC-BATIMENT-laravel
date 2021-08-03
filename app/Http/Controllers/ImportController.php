<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
       
        return view('admin.import');
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
       
       
        if($request->hasfile('file')){

            $file=$request->file('file');
           
      
            $extension=$file->getClientOriginalExtension(); 
            
            if($extension == "csv"){
                $filename=time().'.'.$extension;
      
                $file->move('images',$filename);
    
                $filepath = public_path('images/'.$filename);

                $csv = array_map('str_getcsv', file($filepath));
               
                $headers = $csv[0];

                array_shift($csv); //remove headers
                unlink($filepath);

                return view('admin.datacsv',compact('csv','headers'));
    
            }
           
          }else{
              dd("NO FILE UPLOADED");
          }


    }




    function readCSV($filepath) { 
        
       
        $csv = array_map('str_getcsv', file($filepath));
        $headers = $csv[0];

        array_shift($csv); //remove headers
        unlink($filepath);

        return view('admin.datacsv',compact('csv','headers'));


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
