<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hospital extends Model
{
    use HasFactory;
    protected $table='hospitals';
    protected $fillable=['name','address','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function doctors():HasMany
    {
        return $this->hasMany(Doctor::class,'hospital_id');
    }
}
