<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'type',
        'details'
    ];

    public const TYPE = ['دعم مالي', 'ملابس', 'طعام', 'دواء', 'دم', 'أخرى'];
}
