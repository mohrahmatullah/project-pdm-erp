<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_error_application extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_user', 'error_date', 'modules','controller','function','error_line','error_message','status','param','create_date','create_time','delete_mark','update_by','update_date'];

    public $timestamps = false;
}
