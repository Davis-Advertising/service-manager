@extends('layouts.dashboard')

@section('title')
    Site - {{ $site->site_name }}
@endsection

@section('content')

    <h1>{{ $site->site_name }}</h1>

    <p>{{ $site->site_description }}</p>



    @if ($site->notes->count())
    <div>
        @foreach ($site->notes as $note)
            <form method="POST" action="/notes/{{ $note->id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <label for="completed" class="checkbox">
                    <input type="checkbox" name="completed" onChange="this.form.submit()">
                    {{ $note->description }}
                </label>
            </form>
        @endforeach
    </div>
    @endif

    <p><a href="/sites/{{ $site->id }}/edit">Edit</a></p>
    
@endsection