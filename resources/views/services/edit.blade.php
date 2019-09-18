@extends('layouts.dashboard')

@section('title')
    Edit {{ $service->name }}
@endsection

@section('content')

    <h1>Edit Site</h1>

    <form method="POST" action="/services/{{ $service->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control input{{ $errors->has('name') ? ' alert-danger' : '' }}"  value="{{ $service->name }}" placeholder="Site Name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
        </div>

        @include ('components.errors')

        <button class="btn btn-primary" type="submit">Update</button>

    </form>

    <form method="POST" action="/services/{{ $service->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn-delete" type="submit">Delete</button>
    </form>
@endsection