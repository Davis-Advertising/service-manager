<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function issuers()
    {
        return $this->hasMany(Issuer::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function addNote($note)
    {
        $this->notes()->create($note);

        return back();

        /*return Note::create([
            'site_id' => $this->id,
            'description' => $description
        ]);*/
    }

    /*protected $fillable = [
        'site_name', 'site_url'
    ];*/

    /*public function getSiteNameAttribute($value)
    {
        return $value . '...';
    }*/

}
