<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantCategoryCode extends Model
{
    use HasFactory;
    protected $table = 'merchant_category_codes';
    protected $fillable = ['code', 'description'];
}
