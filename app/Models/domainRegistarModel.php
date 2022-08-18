<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domainRegistarModel extends Model
{
    use HasFactory;
    protected $table = 'domain_registars';
    public $timestamp = false;
}
