<?php

namespace App\Http\Controllers;
use App\Note;
use App\Site;
use Illuminate\Http\Request;

class SiteNotesController extends Controller
{

    public function store(Site $site)
    {
        $attributes = request()->validate(['description' => 'required']);

        $site->addNote($attributes);

        return back();
    }

    public function update(Note $note)
    {
        $note->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
