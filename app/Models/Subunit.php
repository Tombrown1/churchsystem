<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    use HasFactory;

    // public function member()
    // {
    //     return $this->hasOne(Member::class);
    // }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function posting()
    {
        return $this->hasOne(Posting::class);
    }

    public function trackposting()
    {
        return $this->hasOne(TrackPosting::class);
    }
}
