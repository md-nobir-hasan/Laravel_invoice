<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;
use App\Models\hostingProviderModel;


class hostingProviderController extends Controller
{


    function show()
    {



            $hosting_provider = hostingProviderModel::all();
            return view('hosting_provider',compact('hosting_provider'));


    }


function insert(request $request){

    $this->validate($request,[
        "hosting_provider_name" => "required"
    ],
    [
        'hosting_provider_name.required'=> 'Please,Fill up Domain Provider  Name'
    ]);

    $user = DB::table('hosting_providers')
          ->where('hosting_provider_name', $request->hosting_provider_name)
          ->first();

          if($user===null){
            $insert = new hostingProviderModel;
            $insert->hosting_provider_name= $request->hosting_provider_name;
            $insert->save();

                return redirect()->route('admin.hostingProvider')->with('message', 'inserted');
          }else{
            return redirect()->route('admin.hostingProvider')->with('message', 'exist');
          }





    }



     function update(request $request)
     {


         $this->validate($request,[
        "hosting_provider_name" => "required"
    ],
    [
        'hosting_provider_name.required'=> 'Please,Fill up Domain Provider  Name'
    ]);

    $id = $request->id;

    $user = DB::table('hosting_providers')
          ->where('hosting_provider_name', $request->hosting_provider_name)
          ->first();

          if($user===null){
            $update = hostingProviderModel::find($id);
            $update->hosting_provider_name= $request->hosting_provider_name ;
            $update->save();

                return redirect()->route('admin.hostingProvider')->with('message', 'updated');
          }else{
            return redirect()->route('admin.hostingProvider')->with('message', 'existed');
          }





    }

}
