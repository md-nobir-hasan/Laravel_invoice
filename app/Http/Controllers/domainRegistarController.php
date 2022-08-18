<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\domainRegistarModel;



class domainRegistarController extends Controller
{


    function show()
    {

            $domain_registars = domainRegistarModel::all();
            return view('domain_registar',compact('domain_registars'));


    }


function insert(request $request){

    $this->validate($request,[
        "domain_registars_name" => "required"
    ],
    [
        'domain_registars_name.required'=> 'Please,Fill up Domain Provider  Name'
    ]);

    $user = DB::table('domain_registars')
          ->where('domain_registars_name', $request->domain_registars_name)
          ->first();

          if($user===null){
            $insert = new domainRegistarModel;
            $insert->domain_registars_name= $request->domain_registars_name;
            $insert->save();

                return redirect()->route('admin.showDomainRegistar')->with('message', 'inserted');
          }else{
            return redirect()->route('admin.showDomainRegistar')->with('message', 'exist');
          }





    }



     function update(request $request)
     {


         $this->validate($request,[
        "domain_registars_name" => "required"
    ],
    [
        'domain_registars_name.required'=> 'Please,Fill up Domain Provider  Name'
    ]);

    $id = $request->id;

    $user = DB::table('domain_registars')
          ->where('domain_registars_name', $request->domain_registars_name)
          ->first();

          if($user===null){
            $update = domainRegistarModel::find($id);
            $update->domain_registars_name= $request->domain_registars_name ;
            $update->save();

                return redirect()->route('admin.showDomainRegistar')->with('message', 'updated');
          }else{
            return redirect()->route('admin.showDomainRegistar')->with('message', 'existed');
          }





    }

}
