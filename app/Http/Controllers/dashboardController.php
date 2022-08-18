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

class dashboardController extends Controller
{


    function show(){

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
        // dd(($query_inv_info2));
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

            for($j=-1;$j<11;$j++){
                if($j==-1){
                    array_push($temp_array,$query_inv_info2[$i]->client_type_name);
                }
                 elseif($j==0){
                    array_push($temp_array,$query_inv_info2[$i]->c_name);
                }
                else if($j==1)
                {
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null )
                    {
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();
                        array_push($temp_array,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null )
                    {
                        $query = HostingModel::where('id',$hosting_id )->get();
                        array_push($temp_array,$query[0]->hosting_name);
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
                    array_push($temp_array,$query_inv_info2[$i]->id);
                }
                else if($j==10){
                    // dd($query_inv_info2[$i]->attachment);
                    array_push($temp_array,$query_inv_info2[$i]->attachment);
                }


            }
            array_push($temp_array2,$temp_array);




        }
        $num = count($temp_array2);
        $col_num = 10;
        // dd($temp_array2);



// ================================= Pending list show ==========================
// =================================                   ===========================

        $query_inv_info_pen = DB::table('invoices')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    ->where('invoices.invoice_status','=','pending')
                    ->get();
        // dd(($query_inv_info_pen));
        $pending_list = array(array());
        // $temp_array_pen = array();


        for ($i=0;$i<count($query_inv_info_pen);$i++){
            $domain_id = $query_inv_info_pen[$i]->domain_id;
            $hosting_id = $query_inv_info_pen[$i]->hosting_id;
            $domain_and_hosting_id = $query_inv_info_pen[$i]->domain_and_hosting_id;
            $other_project_id = $query_inv_info_pen[$i]->other_project_id;
            $temp_array_pen = array();
            // $pending_list = array(array());
            for($j=-1;$j<10;$j++){
                if($j==-1){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->client_type_name);
                }
                else if($j==0){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->c_name);
                }
                else if($j==1){
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null ){
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();

                        array_push($temp_array_pen,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null ){
                        $query = HostingModel::where('id',$hosting_id )->get();

                        array_push($temp_array_pen,$query[0]->hosting_name);
                    }
                    elseif($domain_and_hosting_id  !=null )
                    {
                        $query = DomainAndHostingModel::where('id',$domain_and_hosting_id)->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        array_push($temp_array_pen,$query[0]->dh_hosting_name);
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    elseif($other_project_id !=null )
                    {
                        $query = otherProjectModel::where('id',$other_project_id )->get();
                        // $project_list[$i][$j] = $query[0]->project_name;
                        array_push($temp_array,$query[0]->project_name);
                    }
                }
                else if($j==2){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->invoice_details);
                }
                else if($j==3){
                    $time_quote_hour = $query_inv_info_pen[$i]->time_quote_hour;
                    $time_quote_min = $query_inv_info_pen[$i]->time_quote_min;
                    $total_time = $time_quote_hour.".".$time_quote_min." hours";
                    array_push($temp_array_pen,$total_time);
                }
                else if($j==4){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->rate_per_hour);
                }
                else if($j==5){
                    $total_price = $query_inv_info_pen[$i]->total_rate;
                    array_push($temp_array_pen,round(floatval($total_price),2)." ".$query_inv_info_pen[$i]->currency_type);
                }
                else if($j==6){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->invoice_status);
                }
                else if($j==7){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->invoiceDate);
                }
                else if($j==8){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->invoiceAlertDate);
                }
                else if($j==9){
                    array_push($temp_array_pen,$query_inv_info_pen[$i]->attachment);
                }
            }
            array_push($pending_list,$temp_array_pen);
        }
        $pending_list_row_count = count($pending_list);
        // dd($pending_list);\



// ===================================================================================
// ============================================== Paid List ==========================
// ===================================================================================

  $query_inv_info_paid = DB::table('invoices')
                    ->select('invoices.*','client_info.c_name','client_type.client_type_name')
                    ->join('client_info','invoices.c_info_id','=','client_info.id')
                    ->join('client_type','invoices.c_type_id','=','client_type.id')
                    ->where('invoices.invoice_status','=','paid')
                    ->get();
        // dd(($query_inv_info_paid));

        $paid_list= array(array());
        // $tem_array_paid = array();
    //    dd($query_inv_info);

        for ($i=0;$i<count($query_inv_info_paid);$i++){
            $domain_id = $query_inv_info_paid[$i]->domain_id;
            $hosting_id = $query_inv_info_paid[$i]->hosting_id;
            $domain_and_hosting_id = $query_inv_info_paid[$i]->domain_and_hosting_id;
            $other_project_id = $query_inv_info_paid[$i]->other_project_id;
            $temp_array_paid = array();
            for($j=-1;$j<11;$j++){
                if($j==-1){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->client_type_name);
                }
                else if($j==0){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->c_name);
                }
                else if($j==1){
                    if($domain_id!=null && $hosting_id==null && $other_project_id==null ){
                        $query = DomainModel::where('id',$domain_id )->pluck('domain_name')->first();


                        array_push($temp_array_paid,$query);
                    }
                    elseif($domain_id==null && $hosting_id!=null && $other_project_id==null ){
                        $query = HostingModel::where('id',$hosting_id )->get();
                        array_push($temp_array_paid,$query[0]->hosting_name);
                    }
                    elseif($domain_and_hosting_id  !=null )
                    {
                        $query = DomainAndHostingModel::where('id',$domain_and_hosting_id)->get();
                        // dd($query[0]->hosting_name);
                        // $project_list[$i][$j] = $query[0]->hosting_name;
                        // dd($query[0]->dh_hosting_name);
                        array_push($temp_array_paid,$query[0]->dh_hosting_name);
                        // dd($paid_list,$temp_array)
                        // array_push($project_list,$query_inv_info2[$i]->c_name);
                    }
                    elseif($other_project_id !=null )
                    {
                        $query = otherProjectModel::where('id',$other_project_id )->get();
                        // $project_list[$i][$j] = $query[0]->project_name;
                        array_push($temp_array,$query[0]->project_name);
                    }
                }
                else if($j==2){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->invoice_details);
                }
                else if($j==3){
                    $time_quote_hour = $query_inv_info_paid[$i]->time_quote_hour;
                    $time_quote_min = $query_inv_info_paid[$i]->time_quote_min;
                    $total_time = $time_quote_hour.".".$time_quote_min." hours";
                    array_push($temp_array_paid,$total_time);
                }
                else if($j==4){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->rate_per_hour);
                }
                else if($j==5){
                    $total_price = $query_inv_info_paid[$i]->total_rate;
                    array_push($temp_array_paid,round(floatval($total_price),2)." ".$query_inv_info_paid[$i]->currency_type);
                }
                else if($j==6){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->invoice_status);
                }
                else if($j==7){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->invoiceDate);
                }
                else if($j==8){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->invoiceAlertDate);
                }
                else if($j==9){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->updated_at);
                }
                else if($j==10){
                    array_push($temp_array_paid,$query_inv_info_paid[$i]->attachment);
                }
             }
            array_push($paid_list,$temp_array_paid);
        }
        $paid_list_row_count = count($paid_list);

        // dd($paid_list);


        // ==============================================================================
        // ================ Dynamic all type of invoice list ============================
        // =============================================================================

        $client_type = clienType::all();

        $domain_invoice_list = invoiceModel::where("domain_id","!=",null)->get();
        $hosting_invoice_list = invoiceModel::where("hosting_id","!=",null)->get();
        $dh_invoice_list = invoiceModel::where("domain_and_hosting_id","!=",null)->get();
        $project_invoice_list = invoiceModel::where("other_project_id","!=",null)->get();
        // dd($dh_invoice_list)








        // =============================================================================
        // ============================== End Dynamic all type of invoice list =====================================
        // ==============================================================================


        return view('dashboard',compact('temp_array2','num','col_num','pending_list','pending_list_row_count','paid_list_row_count','paid_list',"client_type","domain_invoice_list","hosting_invoice_list","dh_invoice_list","project_invoice_list"));
    }




    public function shows(){




        return view('dashboard');
    }


}
