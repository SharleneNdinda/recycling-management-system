<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionCenter extends Model
{
    use HasFactory;

        protected $fillable = [
        'collectioncenter_id', 'location', 'business_number',
    ];
}
