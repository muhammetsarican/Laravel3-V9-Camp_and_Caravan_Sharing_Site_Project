<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    public function camp_category()
    {
        return $this->hasMany(Camp_category::class);
    }
}
