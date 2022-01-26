<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    //المسموح للمستخدم بادخاله
    protected $fillable=['name_ar','name_en','price','details_ar','details_en','created_at','updated_at'];
    //السجلات الغير مسموح استخراجها
    protected $hidden = ['created_at','updated_at'];
}
