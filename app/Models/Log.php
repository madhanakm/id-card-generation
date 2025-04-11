<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model {
    use HasFactory;

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('Y-m-d');
    }
}
