<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;
use App\Models\clientInfoModel;
use App\Models\DomainModel;
use App\Models\HostingModel;
use App\Models\otherProjectModel;
use App\Models\hostingProviderModel;
use App\Models\domainRegistarModel;
use App\Models\DomainAndHostingModel;

class ProjectController extends Controller
{
    //
    function show(){
        $query_c_type = clienType::all();
        $hosting_providers = hostingProviderModel::all();
        $domain_registars = domainRegistarModel::all();
        $all ='all';
        // $query_c_type = clienType::all();

        $query_c_info = DB::table('client_info')
                        ->join('client_type','client_info.c_type_id','=','client_type.id')
                        ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                        ->get();

        $query_domain_info = DB::table('domain_details')
                        ->join('client_type','domain_details.c_type_id','=','client_type.id')
                        ->join('client_info','domain_details.c_info_id','=','client_info.id')
                        ->join('domain_registars','domain_details.domain_registar_id','=','domain_registars.id')
                        ->select('domain_details.*','client_type.client_type_name','client_info.c_name','domain_registars.domain_registars_name')
                        ->get();
        $query_hosting_info = DB::table('hosting_details')
                        ->join('client_type','hosting_details.c_type_id','=','client_type.id')
                        ->join('client_info','hosting_details.c_info_id','=','client_info.id')
                        ->join('hosting_providers','hosting_details.hosting_provider_id','=','hosting_providers.id')
                        ->select('hosting_details.*','client_type.client_type_name','client_info.c_name','hosting_providers.hosting_provider_name')
                        ->get();
        $query_other_project_info = DB::table('other_project_details')
                        ->join('client_type','other_project_details.c_type_id','=','client_type.id')
                        ->join('client_info','other_project_details.c_info_id','=','client_info.id')
                        ->select('other_project_details.*','client_type.client_type_name','client_info.c_name')
                        ->get();
        $domain_and_hosting = DomainAndHostingModel::all();

        $clien_type_array1 = [];

        foreach($query_c_type as $value){
            $client_type_name = $value->client_type_name;
            array_push($clien_type_array1,$client_type_name);
        }

        // $clien_type_array =  array_column($query_c_type,"client_type_name");


        // dd($clien_type_array1);


        return view('project',compact('query_c_type','query_c_info','query_domain_info','query_hosting_info','query_other_project_info',"all","hosting_providers","domain_registars","domain_and_hosting"));
    }

    function ajax($id){
        $data_join = DB::table('client_info')
                     ->join('client_type','client_info.c_type_id','=','client_type.id')
                     ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                     ->where('client_info.c_type_id','=',$id)
                     ->get();
                    //  ->orderBy('police_stations.id','desc')

                     // dd($data_p);

         return response()->json($data_join);

     }


     function insert(request $request)
     {


        // dd($request->hosting_name);

        if($request->domain_name){

            $this->validate($request,[
                'c_type_id'=>'required',
                'c_info_id'=>'required',
                'domain_name'=>'required',
                'd_number_of_year'=>'required',
                's_domain_date'=>'required',
                'e_domain_date'=>'required',
                'domain_registar_id'=>'required'
             ],[
                'c_type_id.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'domain_name.required'=>'Please,fill up domain name',
                'd_number_of_year.required'=>'Please,fill up number of year',
                's_domain_date.required'=>'Please,fill up start domain date',
                'e_domain_date.required'=>'Please,fill up end domain date',
                'domain_registar_id.required'=>'Please,select domain registar name',

             ]);

            $insert = new DomainModel;
            $insert->c_type_id= $request->c_type_id;
            $insert->c_info_id = $request->c_info_id;
            $insert->domain_name = $request->domain_name;
            $insert->domain_registar_id = $request->domain_registar_id;
            $insert->number_of_year = $request->d_number_of_year;
            $insert->domain_start_date = $request->s_domain_date;
            // $insert->domain_start_date = $request->s_domain_date;
            $insert->domain_end_date = $request->e_domain_date;
            $insert->save();
            return redirect()->route('admin.show_project_info')->with('message', 'inserted');
        }
        else if($request->hosting_name){

            $this->validate($request,[
                'c_type_id'=>'required',
                'c_info_id'=>'required',
                'hosting_name'=>'required',
                'hosting_provider_id'=>'required',
                'hosting_domain_name'=>'required',
                'h_number_of_year'=>'required',
                's_hosting_date'=>'required',
                'e_hosting_date'=>'required'
             ],[
                'c_type_id.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'hosting_name.required'=>'Please,fill up hosting pakage',
                'hosting_provider_id.required'=>'Please,select hosting provider name',
                'hosting_domain_name.required'=>'Please,fill up domain name',
                'h_number_of_year.required'=>'Please,fill up number of year',
                's_hosting_date.required'=>'Please,fill up start hosting date',
                'e_hosting_date.required'=>'Please,fill up end hosting date'

             ]);

            $insert = new HostingModel;
            $insert->c_type_id= $request->c_type_id;
            $insert->c_info_id = $request->c_info_id;
            $insert->hosting_name = $request->hosting_name;
            $insert->hosting_provider_id = $request->hosting_provider_id;
            $insert->hosting_domain_name = $request->hosting_domain_name;
            $insert->number_of_year = $request->h_number_of_year;
            $insert->hosting_start_date = $request->s_hosting_date;
            $insert->hosting_end_date = $request->e_hosting_date;
            $insert->save();
            return redirect()->route('admin.show_project_info')->with('message', 'inserted');
        }
        else if($request->dh_hosting_name){

            $this->validate($request,[
                'c_type_id'=>'required',
                'c_info_id'=>'required',
                'dh_hosting_name'=>'required',
                'dh_hosting_provider_id'=>'required',
                'dh_domain_name'=>'required',
                'dh_domain_registrar_id'=>'required',
                'dh_number_of_year'=>'required',
                'dh_start_date'=>'required',
                'dh_end_date'=>'required',
             ],[
                'c_type_id.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'dh_hosting_name.required'=>'Please,fill up hosting pakage',
                'dh_hosting_provider_id.required'=>'Please,select hosting provider name',
                'dh_domain_name.required'=>'Please,fill up domain name',
                'dh_domain_registrar_id.required'=>'Please,Select domain registrar name',
                'dh_number_of_year.required'=>'Please,Select number of the year',
                'dh_start_date.required'=>'Please,Select start date',
                'dh_end_date.required'=>'Please,Select end date'

             ]);

            $insert = new DomainAndHostingModel;
            $insert->c_type_id= $request->c_type_id;
            $insert->c_info_id = $request->c_info_id;
            $insert->dh_hosting_name = $request->dh_hosting_name;
            $insert->dh_hosting_provider_id = $request->dh_hosting_provider_id;
            $insert->dh_domain_name = $request->dh_domain_name;
            $insert->dh_domain_registrar_id = $request->dh_domain_registrar_id;
            $insert->dh_number_of_year = $request->dh_number_of_year;
            $insert->dh_start_date = $request->dh_start_date;
            $insert->dh_end_date = $request->dh_end_date;
            $insert->save();
            return redirect()->route('admin.show_project_info')->with('message', 'inserted');
        }
        else if($request->project_name){
            $this->validate($request,[
                'c_type_id'=>'required',
                'c_info_id'=>'required',
                'project_name'=>'required',
                'project_details'=>'required',
                'project_start_date'=>'required',
                'porject_time_quote'=>'required'
             ],[
                'c_type_id.required'=>'Please,select client type',
                'c_name.required'=>'Please,select client name',
                'project_name.required'=>'Please,fill up project name',
                'project_details.required'=>'Please,fill up project details',
                'project_start_date.required'=>'Please,fill up start date',
                'porject_time_quote.required'=>'Please,fill up time quote'

             ]);

            $insertp = new otherProjectModel;
            $insertp->c_type_id= $request->c_type_id;
            $insertp->c_info_id = $request->c_info_id;
            $insertp->project_name = $request->project_name;
            $insertp->project_details = $request->project_details;
            $insertp->project_start_date = $request->project_start_date;
            $insertp->project_time_quote = $request->porject_time_quote;
            $insertp->save();
            // dd($insert);
            return redirect()->route('admin.show_project_info')->with('message', 'inserted');
        }else{
            return redirect()->route('admin.show_project_info')->with('message', 'select_client');
        }

     }


    function show_domain(){
        $query_c_type = clienType::all();
        // $query_c_type = clienType::all();

        $query_c_info = DB::table('client_info')
                        ->join('client_type','client_info.c_type_id','=','client_type.id')
                        ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                        ->get();

        $query_domain_info = DB::table('domain_details')
                        ->join('client_type','domain_details.c_type_id','=','client_type.id')
                        ->join('client_info','domain_details.c_info_id','=','client_info.id')
                        ->select('domain_details.*','client_type.client_type_name','client_info.c_name')
                        ->get();
        // dd($query_domain_info[1]->client_type_name);
        return view('project',compact('query_c_type','query_c_info','query_domain_info'));

    }

    function show_hosting(){
        $query_c_type = clienType::all();
        // $query_c_type = clienType::all();

        $query_c_info = DB::table('client_info')
                        ->join('client_type','client_info.c_type_id','=','client_type.id')
                        ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                        ->get();

        $query_hosting_info = DB::table('hosting_details')
                        ->join('client_type','hosting_details.c_type_id','=','client_type.id')
                        ->join('client_info','hosting_details.c_info_id','=','client_info.id')
                        ->select('hosting_details.*','client_type.client_type_name','client_info.c_name')
                        ->get();
        // dd($query_domain_info[1]->client_type_name);
        return view('project',compact('query_c_type','query_c_info','query_hosting_info'));

    }

    function show_other_project(){
        $query_c_type = clienType::all();
        // $query_c_type = clienType::all();

        $query_c_info = DB::table('client_info')
                        ->join('client_type','client_info.c_type_id','=','client_type.id')
                        ->select('client_info.*','client_type.client_type_name','client_type.client_type_status')
                        ->get();

        $query_other_project_info = DB::table('other_project_details')
                        ->join('client_type','other_project_details.c_type_id','=','client_type.id')
                        ->join('client_info','other_project_details.c_info_id','=','client_info.id')
                        ->select('other_project_details.*','client_type.client_type_name','client_info.c_name')
                        ->get();
        // dd($query_domain_info[1]->client_type_name);
        return view('project',compact('query_c_type','query_c_info','query_other_project_info'));

    }

    public function update(request $request){

        $id= $request->domain_id_edit;
        // dd($id);
        if($request->domain_name_edit){

            $this->validate($request,[
                'c_type_id_edit'=>'required',
                'c_info_id'=>'required',
                'domain_name_edit'=>'required',
                'd_number_of_year'=>'required',
                's_domain_date'=>'required',
                'e_domain_date'=>'required',
                'domain_registar_id'=>'required'
             ],[
                'c_type_id_edit.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'domain_name_edit.required'=>'Please,fill up domain name',
                'd_number_of_year.required'=>'Please,fill up number of year',
                's_domain_date.required'=>'Please,fill up start domain date',
                'e_domain_date.required'=>'Please,fill up end domain date',
                'domain_registar_id.required'=>'Please,select domain registar name',

             ]);

            $update =  DomainModel::find($id);
            $update->c_type_id= $request->c_type_id_edit;
            $update->c_info_id = $request->c_info_id;
            $update->domain_name = $request->domain_name_edit;
            $update->domain_registar_id = $request->domain_registar_id;
            $update->number_of_year = $request->d_number_of_year;
            $update->domain_start_date = $request->s_domain_date;
            $update->domain_end_date = $request->e_domain_date;

            $update->save();
            return redirect()->route('admin.show_project_info')->with('message', 'updated');
        }
        else if($request->hosting_name){

            $this->validate($request,[
                'c_type_id_edit'=>'required',
                'c_info_id'=>'required',
                'hosting_name'=>'required',
                'hosting_provider_id'=>'required',
                'hosting_domain_name'=>'required',
                'h_number_of_year'=>'required',
                's_hosting_date'=>'required',
                'e_hosting_date'=>'required'
             ],[
                'c_type_id_edit.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'hosting_name.required'=>'Please,fill up hosting pakage',
                'hosting_provider_id.required'=>'Please,select hosting provider name',
                'hosting_domain_name.required'=>'Please,fill up domain name',
                'h_number_of_year.required'=>'Please,fill up number of year',
                's_hosting_date.required'=>'Please,fill up start hosting date',
                'e_hosting_date.required'=>'Please,fill up end hosting date'

             ]);

            $update = HostingModel::find($id);
            $update->c_type_id= $request->c_type_id_edit;
            $update->c_info_id = $request->c_info_id;
            $update->hosting_name = $request->hosting_name;
            $update->hosting_provider_id = $request->hosting_provider_id;
            $update->hosting_domain_name = $request->hosting_domain_name;
            $update->number_of_year = $request->h_number_of_year;
            $update->hosting_start_date = $request->s_hosting_date;
            $update->hosting_end_date = $request->e_hosting_date;
            $update->save();
            return redirect()->route('admin.show_project_info')->with('message', 'updated');
        }
        else if($request->dh_hosting_name){

            $this->validate($request,[
                'c_type_id_edit'=>'required',
                'c_info_id'=>'required',
                'dh_hosting_name'=>'required',
                'dh_hosting_provider_id'=>'required',
                'dh_domain_name'=>'required',
                'dh_domain_registrar_id'=>'required',
                'dh_number_of_year'=>'required',
                'dh_start_date'=>'required',
                'dh_end_date'=>'required',
             ],[
                'c_type_id_edit.required'=>'Please,select client type',
                'c_info_id.required'=>'Please,select client name',
                'dh_hosting_name.required'=>'Please,fill up hosting pakage',
                'dh_hosting_provider_id.required'=>'Please,select hosting provider name',
                'dh_domain_name.required'=>'Please,fill up domain name',
                'dh_domain_registrar_id.required'=>'Please,Select domain registrar name',
                'dh_number_of_year.required'=>'Please,Select number of the year',
                'dh_start_date.required'=>'Please,Select start date',
                'dh_end_date.required'=>'Please,Select end date'

             ]);
// dd($request->c_type_id_edit);
            $update =DomainAndHostingModel::find($id);
            // dd($update);
            $update->c_type_id= $request->c_type_id_edit;
            $update->c_info_id = $request->c_info_id;
            $update->dh_hosting_name = $request->dh_hosting_name;
            $update->dh_hosting_provider_id = $request->dh_hosting_provider_id;
            $update->dh_domain_name = $request->dh_domain_name;
            $update->dh_domain_registrar_id = $request->dh_domain_registrar_id;
            $update->dh_number_of_year = $request->dh_number_of_year;
            $update->dh_start_date = $request->dh_start_date;
            $update->dh_end_date = $request->dh_end_date;
            $update->save();
            return redirect()->route('admin.show_project_info')->with('message', 'updated');
        }
        else{

            $this->validate($request,[
                'c_type_id_edit'=>'required',
                'c_info_id'=>'required',
                'project_name'=>'required',
                'project_details'=>'required',
                'project_start_date'=>'required',
                'porject_time_quote'=>'required'
             ],[
                'c_type_id_edit.required'=>'Please,select client type',
                'c_name.required'=>'Please,select client name',
                'project_name.required'=>'Please,fill up project name',
                'project_details.required'=>'Please,fill up project details',
                'project_start_date.required'=>'Please,fill up start date',
                'porject_time_quote.required'=>'Please,fill up time quote'

             ]);

            $update = otherProjectModel::find($id);
            $update->c_type_id= $request->c_type_id_edit;
            $update->c_info_id = $request->c_info_id;
            $update->project_name = $request->project_name;
            $update->project_details = $request->project_details;
            $update->project_start_date = $request->project_start_date;
            $update->project_time_quote = $request->porject_time_quote;
            $update->save();
            return redirect()->route('admin.show_project_info')->with('message', 'updated');
        }

    }








}
