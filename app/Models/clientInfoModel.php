<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientInfoModel extends Model
{
    use HasFactory;
    protected $table = 'client_info';
    public $timestamp = false;
}
