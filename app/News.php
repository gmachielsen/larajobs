<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class News extends Model
{
    use HasTrixRichText;
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('title', 'like', "%$search%");
        });
    }
}
