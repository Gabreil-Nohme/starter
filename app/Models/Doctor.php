<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Doctor extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable=['name','title','hospital_id','created_at','updated_at','gender'];
    protected $hidden=['created_at','updated_at','pivot'];

public function hospital(): BelongsTo
{
    return $this->belongsTo(Hospital::class,'hospital_id' );
}

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'doctor_id', 'service_id');
    }
}
