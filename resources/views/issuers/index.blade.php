@extends('layouts/main')

@section('title', 'Sites')

@section('content')
    <h1>SSL Issuers</h1>
    
    <table class="table">
        <tbody>
        <tr>
            <td>SSL Issuer</td>
            <td>SSL Duration</td>
        </tr>

        @foreach ($issuers as $issuer)
        <tr>
            <td>{!! isset($issuer->ssl_issuer) ? '<a href="/issuers/' . $issuer->id . '/edit">' . $issuer->ssl_issuer . '</a>' : $issuer->site_name !!}</td>
            <td>{{ $issuer->ssl_duration }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <p><a href="/issuers/create" class="btn btn-primary">Add New SSL Issuer</a></p>

@endsection