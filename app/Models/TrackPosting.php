<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackPosting extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class , 'member_id');
    }

    public function subunit()
    {
        return $this->belongsTo(Subunit::class , 'subunit_id');
    }
}
