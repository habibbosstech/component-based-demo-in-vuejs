<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
        'supplier_name', 'supplier_email', 'company_name', 'website', 'supplier_phone', 'is_active'
    ];
}
