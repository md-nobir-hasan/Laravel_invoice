<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceModel extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    public $timestamp = false;

    /**
         * Get the user that owns the invoiceModel
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function client_type()
        {
            return $this->belongsTo(clienType::class, 'c_type_id');
        }

        /**
         * Get the user that owns the invoiceModel
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function client_info()
        {
            return $this->belongsTo(clientInfoModel::class, 'c_info_id');
        }
    
}
