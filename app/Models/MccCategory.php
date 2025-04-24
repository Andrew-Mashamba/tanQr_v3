<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MccCategory extends Model
{
    use HasFactory;
    protected $table = 'mcc_categories';
    public $guarded = [];
}
