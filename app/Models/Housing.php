<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Housing extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'phone_code',
        'type',
        'title',
        'nb_rooms',
        'area',
        'governorate',
        'city',
        'service_type',
        'furnishing_status',
        'price',
        'description',
        'pending',
        'user_id'
    ];

    public const TYPE = ['بيت', 'شقة', 'شاليه'];
    public const GOVERNORATES = ['بيروت', 'جبل لبنان', 'الجنوب', 'النبطية', 'البقاع', 'الشمال'];
    public const SERVICE_TYPE = ['غير مدفوع', 'مدفوع'];
    public const FURNISHING_STATUS = ['مفروش', 'غير مفروش'];
    public const PENDING = ['pending', 'accepted', 'rejected'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
