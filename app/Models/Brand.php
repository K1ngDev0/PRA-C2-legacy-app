<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'view_count',
    ];

    public function getNameUrlEncodedAttribute()
    {
        $name_url_encoded = str_replace('/','',$this->name);

        return $name_url_encoded;
    }
}
