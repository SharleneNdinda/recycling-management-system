<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $primaryKey = 'bidID';

     protected $fillable = [
         'recyclingplant_id', 'rate', 'description', 'plant_name',
    ];
}
