@extends('layouts.dashboard')

@section('title', 'Add New Service')

@section('content')

    <h1>Add New Service</h1>

    <form method="POST" action="/services">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control input{{ $errors->has('name') ? ' alert-danger' : '' }}"  value="{{ old('name') }}" placeholder="Site Name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        @include ('components.errors')

        <button class="btn btn-primary" type="submit">Submit</button>

    </form>

    <p class="btn-delete"><a href="/sites">Cancel</a></p>

@endsection