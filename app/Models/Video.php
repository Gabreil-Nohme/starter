<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Video extends Model
{
    use HasFactory;
    protected $fillable=['name','viewers'];
    public $timestamps=false;
    public function users()
    {
        return $this->belongsToMany(User::class)->using(View::class);
    }
}
