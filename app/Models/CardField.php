<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardField extends Model
{
    use HasFactory;

    protected $table = 'card_fields';
    public $timestamps = false;

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('value', 'like', '%'.$search.'%');
            });
        });
    }
}
