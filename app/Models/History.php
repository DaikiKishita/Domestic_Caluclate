<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class History extends Model
{
    //
    protected $fillable = [
        'purpose',
        'value',
        'type_id',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'purpose' => 'string',
            'value' => 'integer',
        ];
    }
}
