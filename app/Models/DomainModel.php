<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    use HasFactory;
    protected $table = 'domain_details';
    public $timestamp = false;
}
