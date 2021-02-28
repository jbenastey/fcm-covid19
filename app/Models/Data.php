<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data';
    protected $guarded = array();
    protected $hidden = ['created_at', 'updated_at'];

}
