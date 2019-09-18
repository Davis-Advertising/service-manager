@extends('layouts.dashboard')

@section('title', 'Sites')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>Services</h1>

    <table class="table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td><a href="/services/{{ $service->id }}/edit">Edit</a></td>
            </tr>
        @endforeach
    </table>


    <p><a href="/services/create" class="btn btn-primary">Add Service</a></p>

@endsection