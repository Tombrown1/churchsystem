<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;

    public function announce_cat()
    {
        return $this->belongsTo(AnnoucementCategory::class, 'annouce_cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
