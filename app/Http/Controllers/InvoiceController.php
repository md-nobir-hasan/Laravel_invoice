<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;
use App\Models\clientInfoModel;
use App\Models\DomainModel;
use App\Models\HostingModel;
use App\Models\otherProjectModel;
use App\Models\invoiceModel;
use App\Models\DomainAndHostingModel;

class InvoiceController extends Controller
{
    //
    function show(){

        $query_c_type = clienType::all();
        $query_client = ClientInfoModel::all();
        // dd($query_client);
        $query_c_info1 = DB::table('domain_details')
                    ->join('client_info','domain_details.c_info_id','=','client_info.id')
                    ->join('client_type','domain_details.c_type_id','=','client_type.id')
                    ->select('domain_details.*','client_info.c_name','client_type.client_type_name')
                    ->get();
        // dd($query_c_info1);
        $query_c_info2 = DB::table('hosting_details')
                    ->join('client_info','hosting_details.c_info_id','=','client_info.id')
                    ->join('client_type','hosting_details.c_type_id','=','client_type.id')
                    ->select('hosting_details.*','client_info.c_name','client_type.client_type_name')
                    ->get();

        $query_c_info3 = DB::table('other_project_details')
                    ->join('client_info','other_project_details.c_info_id','=','client_info.id')
                    ->join('client_type','other_project_details.c_type_id','=','client_type.id')
                    ->select('other_project_details.*','client_info.c_name','client_type.client_type_name')
                    ->get();
        $merged = $query_c_info1->merge($query_c_info2);
        $query_c_info2 = $merged->merge($query_c_info3);
        $query_c_info = $query_c_info2->all();

        $query_inv_info =  invoiceModel::all();
        $query_inv_info2 = DB::table('invoices')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->get();
        // dd(($query_inv_info));
        $project_list = array(array());
        $temp_array2 = array();
        //    dd($query_inv_info);


        for ($i=0;$i<count($query_inv_info2);$i++){
            $domain_id = $query_inv_info2[$i]->domain_id;
            $hosting_id = $query_inv_info2[$i]->hosting_id;
            $domain_and_hosting_id = $query_inv_info2[$i]->domain_and_hosting_id;
            $other_project_id = $query_inv_info2[$i]->other_project_id;
            $temp_array = array();
            $project_list = array(array());

            for($j=0;$j<12;$j++){
                if($j==0){
                    array_push($temp_array,$query_inv_info2[$i]->client_type_name);
                }
                 elseif($j==1){
                    array_push($temp_array,$query_inv_info2[$i]->c_name);
                }
                else if($j==2)
                {
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null )
                    {
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();
                        // dd ($query);
                        // var_dump("ass".$query[0]->domain_name);
                        // $project_list[$i][$j] = $query[0]->domain_name;

                        array_push($temp_array,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null )
                    {
                        $query = HostingModel::where('id',$hosting_id )->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        array_push($temp_array,$query[0]->hosting_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    elseif($domain_and_hosting_id  !=null )
                    {
                        $query = DomainAndHostingModel::where('id',$domain_and_hosting_id)->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        array_push($temp_array,$query[0]->dh_hosting_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    elseif($other_project_id !=null )
                    {
                        $query = otherProjectModel::where('id',$other_project_id )->get();
                        // $project_list[$i][$j] = $query[0]->project_name;
                        array_push($temp_array,$query[0]->project_name);
                    }
                }
                else if($j==3){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_details);
                }
                else if($j==4){
                    $time_quote_hour = $query_inv_info2[$i]->time_quote_hour;
                    $time_quote_min = $query_inv_info2[$i]->time_quote_min;
                    $total_time = $time_quote_hour.".".$time_quote_min." hours";
                    array_push($temp_array,$total_time);
                }
                else if($j==5){
                    array_push($temp_array,$query_inv_info2[$i]->rate_per_hour);
                }
                else if($j==6){
                    $total_price = $query_inv_info2[$i]->total_rate;
                    array_push($temp_array,round(floatval($total_price),2)." ".$query_inv_info2[$i]->currency_type);
                }
                else if($j==7){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_status);
                }
                else if($j==8){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceDate);
                }
                else if($j==9){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceAlertDate);
                }
                else if($j==10){
                    array_push($temp_array,$query_inv_info2[$i]->id);
                }
                else if($j==11){
                    // dd($query_inv_info2[$i]->attachment);
                    array_push($temp_array,$query_inv_info2[$i]->attachment);
                }


            }
            array_push($temp_array2,$temp_array);




        }
        $num = count($temp_array2);
        // dd($temp_array2);
        $num2 = 10;
        // dd($temp_array2);

        return view('invoice',compact('query_c_type','query_c_info', 'temp_array2','num','num2','query_client'));
    }





    function ajax($id)
    {
        $data_join_other_project = DB::table('other_project_details')
                     ->join('client_info','other_project_details.c_info_id','=','client_info.id')
                     ->select('other_project_details.*','client_info.c_name')
                     ->where('other_project_details.c_info_id','=',$id)
                     ->get();

        $data_join_domain = DB::table('domain_details')
                     ->join('client_info','domain_details.c_info_id','=','client_info.id')
                     ->select('domain_details.*','client_info.c_name',)
                     ->where('domain_details.c_info_id','=',$id)
                     ->get();
        $data_join_hosting = DB::table('hosting_details')
                     ->join('client_info','hosting_details.c_info_id','=','client_info.id')
                     ->select('hosting_details.*','client_info.c_name')
                     ->where('hosting_details.c_info_id','=',$id)
                     ->get();
        $domain_and_hosting = DB::table('domain_and_hosting')
                     ->join('client_info','domain_and_hosting.c_info_id','=','client_info.id')
                     ->select('domain_and_hosting.*','client_info.c_name')
                     ->where('domain_and_hosting.c_info_id','=',$id)
                     ->get();

        $merged = $data_join_domain->merge($data_join_other_project);
        $merged1 = $data_join_domain->merge($data_join_hosting);
        $merged2 = $merged->merge($data_join_hosting);
        $merged3 = $data_join_domain->merge($data_join_other_project);

        if($data_join_other_project->count()>0 && $data_join_domain->count()>0 && $data_join_hosting->count()>0){

            return response()->json($merged2);
        }
        else if ($data_join_other_project->count()>0 && $data_join_domain->count()>0){

            return response()->json($merged);
        }
        else if ($data_join_hosting->count()>0 && $data_join_domain->count()>0){

            return response()->json($merged1);
        }
        else if ($data_join_hosting->count()>0 && $data_join_other_project->count()>0){

            return response()->json($merged3);
        }
        else if($data_join_other_project->count()>0){
            return response()->json($data_join_other_project);
        }
        else if ($data_join_domain->count()>0){
            return response()->json($data_join_domain);
        }
        else if($data_join_hosting->count()>0){
            return response()->json($data_join_hosting);
            // dd($data_join_hosting);
        }
        else if($domain_and_hosting->count()>0){
            return response()->json($domain_and_hosting);
        }
        else{
            $data = array("data"=>"0");
            return response()->json($data);
        }

    }


     function insert(request $req)
     {
        $this->validate($req,[
            'c_type_id'=>'required',
            'c_name'=>'required',
            'project_name'=>'required',
            'invoice_details'=>'required',
            'time_quote_hour'=>'required',
            'time_quote_minute'=>'required',
            'rate_per_hour'=>'required',
            'currency_type'=>'required',
            'invoiceDate'=>'required',
            'invoiceAlertDate'=>'required',
            'attachement'=>'required',
         ],[
            'c_type_id.required'=>'Please,select client type',
            'c_name.required'=>'Please,select client name',
            'project_name.required'=>'Please,fill up project name',
            'invoice_details.required'=>'Please,fill up project details',
            'time_quote_hour.required'=>'Please,fill up time quote hours',
            'time_quote_minute.required'=>'Please,fill up p time quote minutes',
            'rate_per_hour.required'=>'Please,fill up rate per hour',
            'currency_type.required'=>'Please,fill up currency type',
            'invoiceDate.required'=>'Please,fill up invoice date',
            'invoiceAlertDate.required'=>'Please,fill up invoice alert date',
            'attachement.required'=>'Please,fill up invoice attachment',
         ]);

        // dd($req->c_name);

        $c_info_id = $req->c_name;
        $project_id = $req->project_name;

        $var = preg_split("#/#", $project_id);
        // dd($var);
        $project_id =  $var[0];
        $client_type_id =  $var[1];
        $invoice_details = $req->invoice_details;
        $time_quote_hour = $req->time_quote_hour;
        $time_quote_minute = $req->time_quote_minute;
        $rate_per_hour = $req->rate_per_hour;
        $total_rate= $req->total_rate;
        $currency_type= $req->currency_type;
        $invoiceAlertDate= $req->invoiceAlertDate;
        $invoiceDate= $req->invoiceDate;
        // $attachment= "N/A";
        $attachment= $req->attachement;
        // dd($attachment);
        if($req->hasFile('attachement')){
            $img = $req->File('attachement');
            $img_name =time().'.'.$img->getClientOriginalExtension();
            $img->move('storage/images/',$img_name);

            $attachment = $img_name;
            }

        // dd($currency_type);
        $domain = DomainModel::where('c_type_id', '=', $client_type_id)->first();
        $hosting = HostingModel::where('c_type_id', '=', $client_type_id)->first();
        $other_project = otherProjectModel::where('c_type_id', '=', $client_type_id)->first();
        $domain_and_hosting = DomainAndHostingModel::where('c_type_id', '=', $client_type_id)->first();

        if ($domain !== null) {

            $insert = new invoiceModel;
            $insert->domain_id= $project_id;
            $insert->c_type_id= $client_type_id;
            $insert->c_info_id= $c_info_id;
            $insert->invoice_details= $invoice_details;
            $insert->time_quote_hour= $time_quote_hour;
            $insert->time_quote_min= $time_quote_minute;
            $insert->rate_per_hour= $rate_per_hour;
            $insert->total_rate= $total_rate;
            $insert->currency_type= $currency_type;
            $insert->attachment= $attachment;
            $insert->invoice_status= "pending";
            $insert->invoiceDate= $invoiceDate;
            $insert->invoiceAlertDate= $invoiceAlertDate;
            $insert->save();
            return redirect('admin/show_invoice_info')->with('message', 'inserted');
        // user doesn't exist
        }
        elseif ($hosting !== null) {

            $insert = new invoiceModel;
            $insert->hosting_id= $project_id;
            $insert->c_type_id= $client_type_id;
            $insert->c_info_id= $c_info_id;
            $insert->invoice_details= $invoice_details;
            $insert->time_quote_hour= $time_quote_hour;
            $insert->time_quote_min= $time_quote_minute;
            $insert->rate_per_hour= $rate_per_hour;
            $insert->total_rate= $total_rate;
            $insert->currency_type= $currency_type;
            $insert->attachment= $attachment;
            $insert->invoice_status= "pending";
            $insert->invoiceDate= $invoiceDate;
            $insert->invoiceAlertDate= $invoiceAlertDate;
            $insert->save();

            // dd($insert);
            return redirect('admin/show_invoice_info')->with('message', 'inserted');
        // user doesn't exist
        }
        elseif ($domain_and_hosting !== null) {
            // dd($project_id);
            $insert = new invoiceModel;
            $insert->domain_and_hosting_id = $project_id;
            $insert->c_type_id= $client_type_id;
            $insert->c_info_id= $c_info_id;
            $insert->invoice_details= $invoice_details;
            $insert->time_quote_hour= $time_quote_hour;
            $insert->time_quote_min= $time_quote_minute;
            $insert->rate_per_hour= $rate_per_hour;
            $insert->total_rate= $total_rate;
            $insert->currency_type= $currency_type;
            $insert->attachment= $attachment;
            $insert->invoice_status= "pending";
            $insert->invoiceDate= $invoiceDate;
            $insert->invoiceAlertDate= $invoiceAlertDate;
            $insert->save();
            return redirect('admin/show_invoice_info')->with('message', 'inserted');
        // user doesn't exist
        }
        elseif ($other_project !== null) {
            // dd($project_id);
            $insert = new invoiceModel;
            $insert->other_project_id= $project_id;
            $insert->c_type_id= $client_type_id;
            $insert->c_info_id= $c_info_id;
            $insert->invoice_details= $invoice_details;
            $insert->time_quote_hour= $time_quote_hour;
            $insert->time_quote_min= $time_quote_minute;
            $insert->rate_per_hour= $rate_per_hour;
            $insert->total_rate= $total_rate;
            $insert->currency_type= $currency_type;
            $insert->attachment= $attachment;
            $insert->invoice_status= "pending";
            $insert->invoiceDate= $invoiceDate;
            $insert->invoiceAlertDate= $invoiceAlertDate;
            $insert->save();
            return redirect('admin/show_invoice_info')->with('message', 'inserted');
        // user doesn't exist
        }
        else{
            // dd("something went wrong");
        }


     }


     public function update_page_show($id){

        $invoice_query = invoiceModel::where('id','=',$id)
                                            ->get();


        if($invoice_query[0]->domain_id !=  null)
        {
            $invoice_join_query_filter = DB::table('invoices')
            ->select('invoices.*','client_info.c_name','client_type.client_type_name','domain_details.domain_name')
            ->join('client_info','invoices.c_info_id','=','client_info.id')
            ->join('client_type','invoices.c_type_id','=','client_type.id')
            ->join('domain_details','invoices.domain_id','=','domain_details.id')
            // ->where('c_type_id','=',$client_type_id)
            ->where('invoices.id','=',$id)
            ->get();
        }
        if($invoice_query[0]->hosting_id !=  null)
        {
            $invoice_join_query_filter = DB::table('invoices')
            ->select('invoices.*','client_info.c_name','client_type.client_type_name','hosting_details.hosting_name')
            ->join('client_info','invoices.c_info_id','=','client_info.id')
            ->join('client_type','invoices.c_type_id','=','client_type.id')
            ->join('hosting_details','invoices.hosting_id','=','hosting_details.id')
            // ->where('c_type_id','=',$client_type_id)
            ->where('invoices.id','=',$id)
            ->get();
        }
        if($invoice_query[0]->domain_and_hosting_id !=  null)
        {
            $invoice_join_query_filter = DB::table('invoices')
            ->select('invoices.*','client_info.c_name','client_type.client_type_name','domain_and_hosting.dh_hosting_name')
            ->join('client_info','invoices.c_info_id','=','client_info.id')
            ->join('client_type','invoices.c_type_id','=','client_type.id')
            ->join('domain_and_hosting','invoices.domain_and_hosting_id','=','domain_and_hosting.id')
            // ->where('c_type_id','=',$client_type_id)
            ->where('invoices.id','=',$id)
            ->get();
        }
        if($invoice_query[0]->other_project_id != null)
        {
            $invoice_join_query_filter = DB::table('invoices')
            ->select('invoices.*','client_info.c_name','client_type.client_type_name','other_project_details.project_name')
            ->join('client_info','invoices.c_info_id','=','client_info.id')
            ->join('client_type','invoices.c_type_id','=','client_type.id')
            ->join('other_project_details','invoices.other_project_id','=','other_project_details.id')
            // ->where('c_type_id','=',$client_type_id)
            ->where('invoices.id','=',$id)
            ->get();
        }




        return view('update.invoice_update',compact('invoice_join_query_filter'));
     }



    public function update(Request $req){

        $this->validate($req,[
            'invoice_details'=>'required',
            'time_quote_hour'=>'required',
            'time_quote_minute'=>'required',
            'rate_per_hour'=>'required',
            'currency_type'=>'required',
            'invoiceDate'=>'required',
            'invoiceAlertDate'=>'required',
            'attachement'=>'required',
         ],[
            'invoice_details.required'=>'Please,fill up project details',
            'time_quote_hour.required'=>'Please,fill up time quote hours',
            'time_quote_minute.required'=>'Please,fill up p time quote minutes',
            'rate_per_hour.required'=>'Please,fill up rate per hour',
            'currency_type.required'=>'Please,fill up currency type',
            'invoiceDate.required'=>'Please,fill up invoice date',
            'invoiceAlertDate.required'=>'Please,fill up invoice alert date',
            'attachement.required'=>'Please,fill up invoice attachment',
         ]);

    $invoice_details = $req->invoice_details;
    $time_quote_hour = $req->time_quote_hour;
    $time_quote_minute = $req->time_quote_minute;
    $rate_per_hour = $req->rate_per_hour;
    $total_rate= $req->total_rate;
    $currency_type= $req->currency_type;
    $invoiceAlertDate= $req->invoiceAlertDate;
    $invoiceDate= $req->invoiceDate;
    // $attachment= "N/A";
    $attachment= $req->attachement;
    // dd($attachment);
    if($req->hasFile('attachement')){
        $img = $req->File('attachement');
        $img_name =time().'.'.$img->getClientOriginalExtension();
        $img->move('storage/images/',$img_name);

        $attachment = $img_name;
        }

        $id = $req->id;


        $update = invoiceModel::find($id);
        $update->invoice_details= $invoice_details;
        $update->time_quote_hour= $time_quote_hour;
        $update->time_quote_min= $time_quote_minute;
        $update->rate_per_hour= $rate_per_hour;
        $update->total_rate= $total_rate;
        $update->currency_type= $currency_type;
        $update->attachment= $attachment;
        // $update->invoice_status= "pending";
        $update->invoiceDate= $invoiceDate;
        $update->invoiceAlertDate= $invoiceAlertDate;
        $update->save();
        return redirect('admin/show_invoice_info')->with('message', 'updated');

    }
 }


