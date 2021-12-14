<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnersDeal extends Model
{
    use HasFactory;

    protected $table = 'partners_deals';

    protected $primaryKey = 'id';

    protected $dates = [            
        'created_at',        
        'updated_at',
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner',
        'deals_description',
        'terms', 
        'image_url',           
    ];  
}
