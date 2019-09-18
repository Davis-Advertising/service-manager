@extends('layouts/main')

@section('title')
    Edit Issuer
@endsection

@section('content')

    <h1>Edit Issuer</h1>

    <form method="POST" action="/issuers/{{ $issuer->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for=ssl_issuer">Certificate Issuer</label>
            <input type="text" name="ssl_issuer" class="form-control input" value="{{ $issuer->ssl_issuer }}" placeholder="SSL Issuer">
        </div>

        <div class="form-group">
            <label for="ssl_duration">Certificate Duration</label>
            <input type="text" name="ssl_duration" class="form-control input" value="{{ $issuer->ssl_duration }}" placeholder="SSL Issuer">
        </div>

        <button class="btn btn-primary" type="submit">Update</button>

    </form>

    <form method="POST" action="/issuers/{{ $issuer->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn-delete">Delete</button>
    </form>
@endsection