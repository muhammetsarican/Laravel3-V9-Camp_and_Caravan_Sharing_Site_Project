<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'camp_id',
        'user_id',
        'IP',
        'subject',
        'review',
        'rate',
        'cleaning_rate',
        'service_rate',
        'price_performance_rate',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function camp(){
        return $this->belongsTo(Camp::class);
    }
}
