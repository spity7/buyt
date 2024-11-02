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
        'type',
        'type_description',
        'nb_rooms',
        'area',
        'governorate',
        'city',
        'service_type',
        'furnishing_status',
        'price',
        'whatsapp_check',
        'description',
        'user_id'
    ];

    public const TYPE = ['بيت', 'شقة', 'شاليه', 'مركز'];
    public const GOVERNORATE = ['بيروت', 'جبل لبنان', 'الجنوب', 'النبطية', 'البقاع', 'الشمال'];
    public const CITY_1 = ['الأشرفية', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'زقاق البلاط'];
    public const CITY_2 = ['ضضضضضض', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'ضضضضضضض'];
    public const CITY_3 = ['شششششش', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'ششششششش'];
    public const CITY_4 = ['ييييييي', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'ييييييي'];
    public const CITY_5 = ['ففففففف', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'فففففففف'];
    public const CITY_6 = ['ععععععع', 'عين المريسة', 'الباشورة', 'ميناء الحصن', 'المزرعة', 'المدوّر', 'المصيطبة', 'المرفأ', 'رأس بيروت', 'الرميل', 'الصيفي', 'عععععععع'];
    public const SERVICE_TYPE = ['غير مدفوع', 'مدفوع'];
    public const FURNISHING_STATUS = ['مفروش', 'غير مفروش'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
