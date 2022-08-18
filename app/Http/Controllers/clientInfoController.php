<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;
use App\Models\clientInfoModel;

class clientInfoController extends Controller
{
    function show(){


        $query_c_type = clienType::all();
       $query_c_info = DB::table('client_info')
                    ->join('client_type','client_info.c_type_id','=','client_type.id')
                    ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                    ->get();
        return view('client_info',compact('query_c_type','query_c_info'));

    }


    function insert(request $request){

        $this->validate($request,[
            "c_type_id" => "required",
            "c_email" => "required",
            "c_website" => "required",
            "c_name" => "required",
            ],
            [
                'c_type_id.required'=> 'Please Select Client Type',
                'c_email.required'=> 'Please Fill Up Email',
                'c_website.required'=> 'Please Fill Up Website',
                'c_name.required'=> 'Please Fill Up Name',
            ]
        );

        $user = DB::table('client_info')
                ->where('c_type_id', $request->c_type_id)
               ->where('c_email', $request->c_email)
               ->where('c_website', $request->c_website)
               ->first();




               if($user===null ){


                if($request->c_phone==null){
                    $request->c_phone="N/A";
                }
                if($request->c_address==null){
                    $request->c_address="N/A";
                }

                $insert = new clientInfoModel;

                $insert->c_type_id= $request->c_type_id;
                $insert->c_name = $request->c_name;
                $insert->c_website = $request->c_website;
                $insert->c_email = $request->c_email;
                $insert->c_phone = $request->c_phone;
                $insert->c_address = $request->c_address;

                $insert->save();
                return redirect('admin/show_client_info')->with('message', 'inserted');

               }else{
                return redirect('admin/show_client_info')->with('message', 'existed');
               }





    }


    public function update(request $request){

        $this->validate($request,[
            "c_type_id" => "required",
            "c_email" => "required",
            "c_website" => "required",
            "c_name" => "required",
            ],
            [
                'c_type_id.required'=> 'Please Select Client Type',
                'c_email.required'=> 'Please Fill Up Email',
                'c_website.required'=> 'Please Fill Up Website',
                'c_name.required'=> 'Please Fill Up Name',
            ]
        );

        $id= $request->id;

        $user_id = DB::table('client_info')
                ->where('c_type_id','=', $request->c_type_id)
                ->where('id','!=', $id)
                ->first();

        $user = DB::table('client_info')
        ->where('c_type_id', $request->c_type_id)
        ->where('c_email', $request->c_email)
        ->where('c_website', $request->c_website)
        ->where('id','!=', $id)
        ->first();


    //    if($user_id===null && $user==null){ 

            if($request->c_phone==null){
                $request->c_phone="N/A";
            }
            if($request->c_address==null){
                $request->c_address="N/A";
            }

            $update = clientInfoModel::find($id);





            $update->c_type_id= $request->c_type_id;
            $update->c_name = $request->c_name;
            $update->c_website = $request->c_website;
            $update->c_email = $request->c_email;
            $update->c_phone = $request->c_phone;
            $update->c_address = $request->c_address;
            $update->save();
            return redirect('admin/show_client_info')->with('message', 'updated');
        // }else{
            // return redirect('admin/show_client_info')->with('message', 'existed');
            //  }  

    }

 }



