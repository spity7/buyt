<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'pCode',
        'governorateId',
        'status',
        'name',
        'nameAr',
        'latitude',
        'longitude',
        'elevation'
    ];

    public function housings()
    {
        $this->hasMany(Housing::class);
    }
}
