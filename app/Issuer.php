<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    protected $guarded = [];
    
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
