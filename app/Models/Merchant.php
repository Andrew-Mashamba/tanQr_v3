<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    use Search;
    protected $table = 'merchants';

    protected $fillable = [
        'alias',
        'domain_name',
        'acquirer_id',
        'merchant_id',
        'UDS_account',
        'TZS_account',
        'merchant_category_code',
        'additional_merchant_information',
        'merchant_language_template',
        'merchant_name',
        'merchant_city',
        'postal_code',
        'country_code'
    ];

    protected $searchable = [
        'alias',
        'domain_name',
        'acquirer_id',
        'merchant_id',
        'UDS_account',
        'TZS_account',
        'merchant_category_code',
        'additional_merchant_information',
        'merchant_language_template',
        'merchant_name',
        'merchant_city',
        'postal_code',
        'country_code'

    ];
}
