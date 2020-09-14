<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
