<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainAndHostingModel extends Model
{
    use HasFactory;
    protected $table = 'domain_and_hosting';

    public function client_type(){

        // return $this->belongsTo("App/clienType");
        return $this->belongsTo(clienType::class,'c_type_id');
    }


    public function client_info(){

        return $this->belongsTo(clientInfoModel::class,"c_info_id");
    }


    public function hosting_providers(){

        return $this->belongsTo(hostingProviderModel::class,"dh_hosting_provider_id");
    }


    public function domain_registars(){

        return $this->belongsTo(domainRegistarModel::class,"dh_domain_registrar_id");
    }
}
