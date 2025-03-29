<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function histories(){
        return $this->hasMany(History::class);
    }

    protected function casts(): array
    {
        return [
            'name' => 'string',
        ];
    }
}
