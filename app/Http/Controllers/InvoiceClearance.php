<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\clienType;
use App\Models\clientInfoModel;
use App\Models\DomainModel;
use App\Models\HostingModel;
use App\Models\otherProjectModel;
use App\Models\invoiceModel;
use Illuminate\Http\Request;

class InvoiceClearance extends Controller
{

    public function show(){

        $query_c_type = clienType::all();
        $query_client = ClientInfoModel::all();
        return view('invoice_clearance',compact('query_c_type'));
    }



    public function filter(Request $req){

        $client_id = $req->c_name;
        $client_type_id = $req->c_type_id;

        $query_c_type = clienType::all();

        $invoice_join_query = DB::table('invoices')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    // ->where('c_type_id','=',$client_type_id)
                    ->where('c_info_id','=',$client_id)
                    ->get();
                    // dd($invoice_join_query);
        if(isset($invoice_join_query[0]))
        {
            // dd($query_inv_info2[0]->domain_id );
            if($invoice_join_query[0]->domain_id !=  null)
            {
                $invoice_join_query_filter = DB::table('invoices')
                ->select('invoices.*','client_info.c_name','client_type.client_type_name','domain_details.domain_name')
                ->join('client_info','invoices.c_info_id','=','client_info.id')
                ->join('client_type','invoices.c_type_id','=','client_type.id')
                ->join('domain_details','invoices.domain_id','=','domain_details.id')
                // ->where('c_type_id','=',$client_type_id)
                ->where('invoices.c_info_id','=',$client_id)
                ->get();
            }
            if($invoice_join_query[0]->hosting_id !=  null)
            {
                $invoice_join_query_filter = DB::table('invoices')
                ->select('invoices.*','client_info.c_name','client_type.client_type_name','hosting_details.hosting_name')
                ->join('client_info','invoices.c_info_id','=','client_info.id')
                ->join('client_type','invoices.c_type_id','=','client_type.id')
                ->join('hosting_details','invoices.hosting_id','=','hosting_details.id')
                // ->where('c_type_id','=',$client_type_id)
                ->where('invoices.c_info_id','=',$client_id)
                ->get();
            }
            if($invoice_join_query[0]->domain_and_hosting_id != null)
            {
                $invoice_join_query_filter = DB::table('invoices')
                ->select('invoices.*','client_info.c_name','client_type.client_type_name','domain_and_hosting.dh_hosting_name')
                ->join('client_info','invoices.c_info_id','=','client_info.id')
                ->join('client_type','invoices.c_type_id','=','client_type.id')
                ->join('domain_and_hosting','invoices.domain_and_hosting_id','=','domain_and_hosting.id')
                // ->where('c_type_id','=',$client_type_id)
                ->where('invoices.c_info_id','=',$client_id)
                ->get();
            }
            if($invoice_join_query[0]->other_project_id != null)
            {
                $invoice_join_query_filter = DB::table('invoices')
                ->select('invoices.*','client_info.c_name','client_type.client_type_name','other_project_details.project_name')
                ->join('client_info','invoices.c_info_id','=','client_info.id')
                ->join('client_type','invoices.c_type_id','=','client_type.id')
                ->join('other_project_details','invoices.other_project_id','=','other_project_details.id')
                // ->where('c_type_id','=',$client_type_id)
                ->where('invoices.c_info_id','=',$client_id)
                ->get();
            }

            return view('invoice_clearance',compact('invoice_join_query_filter','query_c_type'));
        }else{
            $noData = 'No data available for this client';
            return view('invoice_clearance',compact('query_c_type','noData'))->with('message','noData');
        }


    }


    // Invoice Pending Status Change
    public function statusChange(Request $req)
    {
        $id = $req->id;
        // dd($id);
        $update = invoiceModel::find($id);
        // dd();

        if($update->invoice_status !='paid'){
            $update->invoice_status='paid';
        }else{

            $update->invoice_status='pending';
        }
        $update->save();

        return redirect()->route('clearance.show');
    }


    //   Pending List Function
    public function pendingList(){
        $query_c_type = clienType::all();
        $query_client = ClientInfoModel::all();
        // dd($query_client);
        $query_c_info1 = DB::table('domain_details')
                    ->join('client_info','domain_details.c_info_id','=','client_info.id')
                    ->join('client_type','domain_details.c_type_id','=','client_type.id')
                    ->select('domain_details.*','client_info.c_name','client_type.client_type_name')
                    ->get();
        // dd($query_c_info);
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

        $query_inv_info =  invoiceModel::where('invoices.invoice_status','=','pending')
                                        ->get();
        $query_inv_info2 = DB::table('invoices')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    ->where('invoices.invoice_status','=','pending')
                    ->get();
        // dd(($query_inv_info2));
        $project_list = array(array());
        $temp_array2 = array();
    //    dd($query_inv_info);

        for ($i=0;$i<count($query_inv_info);$i++){
            $domain_id = $query_inv_info[$i]->domain_id;
            $hosting_id = $query_inv_info[$i]->hosting_id;
            $other_project_id = $query_inv_info[$i]->other_project_id;
            $temp_array = array();
            $project_list = array(array());
            for($j=-1;$j<10;$j++){
                if($j==-1){
                    array_push($temp_array,$query_inv_info2[$i]->client_type_name);
                }
                else if($j==0){
                    array_push($temp_array,$query_inv_info2[$i]->c_name);
                }
                else if($j==1){
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null ){
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();
                        // dd ($query);
                        // var_dump("ass".$query[0]->domain_name);
                        // $project_list[$i][$j] = $query[0]->domain_name;

                        array_push($temp_array,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null ){
                        $query = HostingModel::where('id',$hosting_id )->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        array_push($temp_array,$query[0]->hosting_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    else{
                        $query = otherProjectModel::where('id',$other_project_id )->get();
                        // $project_list[$i][$j] = $query[0]->project_name;
                        array_push($temp_array,$query[0]->project_name);
                        // dd($query[0]->project_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                }
                else if($j==2){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_details);
                }
                else if($j==3){
                    $time_quote_hour = $query_inv_info2[$i]->time_quote_hour;
                    $time_quote_min = $query_inv_info2[$i]->time_quote_min;
                    $total_time = $time_quote_hour.".".$time_quote_min." hours";
                    array_push($temp_array,$total_time);
                }
                else if($j==4){
                    array_push($temp_array,$query_inv_info2[$i]->rate_per_hour);
                }
                else if($j==5){
                    $total_price = $query_inv_info2[$i]->total_rate;
                    array_push($temp_array,round(floatval($total_price),2)." ".$query_inv_info2[$i]->currency_type);
                }
                else if($j==6){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_status);
                }
                else if($j==7){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceDate);
                }
                else if($j==8){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceAlertDate);
                }
                else if($j==9){
                    array_push($temp_array,$query_inv_info2[$i]->attachment);
                }


            }
            array_push($temp_array2,$temp_array);




        }
        $num = count($temp_array2);
        $num2 = 10;
        // dd($temp_array2);

        return view('invoice_pending_list',compact('query_c_type','query_c_info', 'temp_array2','num','num2','query_client'));

        // return view('invoice_pending_list',compact('invoice_pending_query'));
    }



    // Paid List Function
    public function paidList(){
        $query_c_type = clienType::all();
        $query_client = ClientInfoModel::all();
        // dd($query_client);
        $query_c_info1 = DB::table('domain_details')
                    ->join('client_info','domain_details.c_info_id','=','client_info.id')
                    ->join('client_type','domain_details.c_type_id','=','client_type.id')
                    ->select('domain_details.*','client_info.c_name','client_type.client_type_name')
                    ->get();
        // dd($query_c_info);
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

        $query_inv_info =  invoiceModel::where('invoices.invoice_status','=','paid')
                                        ->get();
        $query_inv_info2 = DB::table('invoices')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    ->where('invoices.invoice_status','=','paid')
                    ->get();
        // dd(($query_inv_info2));
        $project_list = array(array());
        $temp_array2 = array();
    //    dd($query_inv_info);

        for ($i=0;$i<count($query_inv_info);$i++){
            $domain_id = $query_inv_info[$i]->domain_id;
            $hosting_id = $query_inv_info[$i]->hosting_id;
            $other_project_id = $query_inv_info[$i]->other_project_id;
            $temp_array = array();
            $project_list = array(array());
            for($j=-1;$j<11;$j++){
                if($j==-1){
                    array_push($temp_array,$query_inv_info2[$i]->client_type_name);
                }
                else if($j==0){
                    array_push($temp_array,$query_inv_info2[$i]->c_name);
                }
                else if($j==1){
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null ){
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();
                        // dd ($query);
                        // var_dump("ass".$query[0]->domain_name);
                        // $project_list[$i][$j] = $query[0]->domain_name;

                        array_push($temp_array,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null ){
                        $query = HostingModel::where('id',$hosting_id )->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        array_push($temp_array,$query[0]->hosting_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    else{
                        $query = otherProjectModel::where('id',$other_project_id )->get();
                        // $project_list[$i][$j] = $query[0]->project_name;
                        array_push($temp_array,$query[0]->project_name);
                        // dd($query[0]->project_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                }
                else if($j==2){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_details);
                }
                else if($j==3){
                    $time_quote_hour = $query_inv_info2[$i]->time_quote_hour;
                    $time_quote_min = $query_inv_info2[$i]->time_quote_min;
                    $total_time = $time_quote_hour.".".$time_quote_min." hours";
                    array_push($temp_array,$total_time);
                }
                else if($j==4){
                    array_push($temp_array,$query_inv_info2[$i]->rate_per_hour);
                }
                else if($j==5){
                    $total_price = $query_inv_info2[$i]->total_rate;
                    array_push($temp_array,round(floatval($total_price),2)." ".$query_inv_info2[$i]->currency_type);
                }
                else if($j==6){
                    array_push($temp_array,$query_inv_info2[$i]->invoice_status);
                }
                else if($j==7){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceDate);
                }
                else if($j==8){
                    array_push($temp_array,$query_inv_info2[$i]->invoiceAlertDate);
                }
                else if($j==9){
                    array_push($temp_array,$query_inv_info2[$i]->updated_at);
                }
                else if($j==10){
                    array_push($temp_array,$query_inv_info2[$i]->attachment);
                }



            }
            array_push($temp_array2,$temp_array);




        }
        $num = count($temp_array2);
        $num2 = 10;
        // dd($temp_array2);

        return view('invoice_paid_list',compact('query_c_type','query_c_info', 'temp_array2','num','num2','query_client'));
        // return view('invoice_paid_list',compact('invoice_paid_query'));
    }
}
