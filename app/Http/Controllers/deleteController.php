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
use App\Models\hostingProviderModel;
use App\Models\domainRegistarModel;
use App\Models\DomainAndHostingModel;

class deleteController extends Controller
{
    function deletes($model,$id)
    {
        // $id = $request->id;
                    // $delete_row=$model::find($id);
                    // $delete_row->delete();
                    // return redirect()->route('show_client_type')->with('message', 'deleted');

            if($model==="clienType")
            {

                    $delete_row=clienType::find($id);
                    $delete_row->delete();
                    return redirect()->route('show_client_type')->with('message', 'deleted');
            }
            elseif($model==="clientInfoModel")
            {
                    $delete_row=clientInfoModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.show_client_info')->with('message', 'deleted');
            }
            elseif($model==="DomainModel")
            {
                    $delete_row=DomainModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.show_project_info')->with('message', 'deleted');
            }
            elseif($model==="HostingModel")
            {
                    $delete_row=HostingModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.show_project_info')->with('message', 'deleted');
            }
            elseif($model==="otherProjectModel")
            {
                    $delete_row=otherProjectModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.show_project_info')->with('message', 'deleted');
            }
            elseif($model==="invoiceModel")
            {
                    $delete_row=invoiceModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.invoiceShow')->with('message', 'deleted');
            }
            elseif($model==="hostingProviderModel")
            {
                    $delete_row=hostingProviderModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.hostingProvider')->with('message', 'deleted');
            }
            elseif($model==="domainRegistarModel")
            {
                    $delete_row=domainRegistarModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.showDomainRegistar')->with('message', 'deleted');
            }
            elseif($model==="DomainAndHostingModel")
            {
                    $delete_row=DomainAndHostingModel::find($id);
                    $delete_row->delete();
                    return redirect()->route('admin.show_project_info')->with('message', 'deleted');
            }




    }


}
