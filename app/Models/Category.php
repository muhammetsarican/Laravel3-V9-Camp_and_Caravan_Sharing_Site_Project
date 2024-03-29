<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $appends=[
        'parent',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function camp_category()
    {
        return $this->hasMany(Camp_category::class);
    }

    public function filter()
    {
        return $this->hasMany(Filter::class);
    }
}
