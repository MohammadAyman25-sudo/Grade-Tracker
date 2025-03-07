<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    //
    protected $fillable = [
        "name",
        "executed"
    ];

    protected $table = "flags";
}
