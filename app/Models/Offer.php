<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    Protected $fillable = ['id','name','peice','photo','details'];
    protected $hidden = ['created_at','updated_at'];

    use HasFactory;
}
