<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityClass extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function join()
    {
        return $this->belongsTo(Fitness::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
