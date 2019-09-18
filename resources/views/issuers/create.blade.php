@extends('layouts/main')

@section('title', 'Add New SSL Issuer')

@section('content')
    <h1>Add New SSL Issuer</h1>
    <form method="POST" action="/issuers">
        {{ method_field('POST') }}
        {{ csrf_field() }}


        <div class="form-group">
            <label for=ssl_issuer">Certificate Issuer</label>
            <input type="text" name="ssl_issuer" class="form-control input" value="{{ old('ssl_issuer') }}" placeholder="SSL Issuer">
        </div>

        <div class="form-group">
            <label for="ssl_duration">Certificate Duration</label>
            <input type="text" name="ssl_duration" class="form-control input" value="{{ old('ssl_duration') }}" placeholder="SSL Issuer">
        </div>

        @include ('errors')

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <p class="btn-delete"><a href="/sites">Cancel</a></p>
@endsection