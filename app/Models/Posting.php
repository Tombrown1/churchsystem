<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function subunit()
    {
        return $this->belongsTo(Subunit::class);
    }
}
 