<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = ['link_id', 'user_agent'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
