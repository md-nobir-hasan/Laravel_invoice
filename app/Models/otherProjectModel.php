<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherProjectModel extends Model
{
    use HasFactory;
    protected $table = 'other_project_details';
    public $timestamp = false;
}
