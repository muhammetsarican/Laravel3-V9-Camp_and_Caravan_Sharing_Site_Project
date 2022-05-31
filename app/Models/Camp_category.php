<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp_category extends Model
{
    use HasFactory;

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
