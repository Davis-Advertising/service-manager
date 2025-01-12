<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'services', 'id');
    }
}
