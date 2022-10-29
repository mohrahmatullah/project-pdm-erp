<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_activity extends Model
{
    use HasFactory;

    protected $fillable = ['no_activity', 'id_user', 'description','status','menu_id','delete_mark','create_by','create_date'];

    public $timestamps = false;
}
