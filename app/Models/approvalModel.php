<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approvalModel extends Model
{
    use HasFactory;
    protected $table='approvals';
    protected $guarded=[];
}
