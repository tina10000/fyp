<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll_option extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'poll_option';


    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}
