<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = ["grade", "user_id", "course_id"];
    protected $hidden = ["user_id", "course_id"];
    protected $table = "grade";
}
