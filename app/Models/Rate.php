<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'rateID';
    
       protected $fillable = [
         'recyclingplant_id', 'amount_of_plastic', 'buying_rate', 'rate_name',
    ];
}
