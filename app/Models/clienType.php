<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienType extends Model
{
    use HasFactory;
    protected $table = 'client_type';
    public $timestamp = false;
}
