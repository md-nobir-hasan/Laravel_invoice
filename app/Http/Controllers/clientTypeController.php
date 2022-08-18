<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;


class clientTypeController extends Controller
{


    function show()
    {



            $query_client_type = clienType::all();
            return view('client_type',compact('query_client_type'));


    }


function insert(request $request){

    $this->validate($request,[
        "client_type_name" => "required",
    ],
    [
        'client_type_name.required'=> 'Please,Fill up Client Type Name',
    ]);

    $user = DB::table('client_type')
          ->where('client_type_name', $request->client_type_name)
          ->first();

          if($user===null){
            $insert = new clienType;
            $insert->client_type_name= $request->client_type_name ;
            $insert->client_type_status= 'Null';
            $insert->save();

                return redirect('admin/show_client_type')->with('message', 'inserted');
          }else{
            return redirect('admin/show_client_type')->with('message', 'existed');
          }





    }
    function update_page($id)
    {


            $query_client_type = clienType::where ('id',$id)->first();
            return view('update.client_type',compact('query_client_type'));


    }



     function update(request $request,$id)
     {


        $this->validate($request,[
            "client_type_name" => "required",
        ],
        [
            'client_type_name.required'=> 'Please,Fill up Client Type Name',
        ]);


        $user = DB::table('client_type')
        ->where('client_type_name', $request->client_type_name)
        ->where('id','!=', $id)
        ->first();

        if($user===null){

            $update = clienType::find($id);

            $update->client_type_name= $request->client_type_name ;
            $update->save();
            return redirect('admin/show_client_type')->with('message', 'updated');

        }else{
            return redirect('admin/show_client_type')->with('message', 'exist');

            }





    }

}
