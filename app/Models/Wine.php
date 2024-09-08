<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wine extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['name','domain','year','region_id'];

    public function region()
    {
        return $this->belongsTo(region::class);
    }
}
