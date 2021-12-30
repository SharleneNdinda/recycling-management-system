<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
       protected $fillable = [
         'bid_id', 'collectioncenter_id', 'quantity', 'description', 'accepted'
    ];
}
