<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isos extends Model
{
    use HasFactory;
    use Search;

    protected $table = 'isos';

    protected $fillable = [
        'name', 'tin', 'license', 'status'
    ];

    protected $searchable = [
        'name', 'tin', 'license'

    ];
}