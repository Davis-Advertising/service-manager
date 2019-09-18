@extends('layouts.dashboard')

@section('title')
    Edit Notification
@endsection

@section('content')

    <h1>Edit Notification</h1>


    <form method="POST" action="/notifications/{{ $notification->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="site_id">Website</label>
            <select class="form-control" id="site_id" class="{{ $errors->has('site_id') ? ' is-danger' : '' }}" name="site_id">
                @foreach ($sites as $site)
                    @if ($site->id == 0)
                        <option>Select One</option>
                    @else
                        <option value="{{ $site->id }}" {{ $notification->site_id == $site->id ? ' selected' : '' }}>{{ $site->site_name }}</option>
                    @endif

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Service Type</label>
            <select class="form-control" id="type" class="{{ $errors->has('service_id') ? ' is-danger' : '' }}" name="service_id">
                @foreach ($services as $service)

                        @if ($notification->service_id == $service->id)
                            <option value="{{ $service->id }}" selected>{{ $service->name }}</option>
                        @else
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endif

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="expiration">Expiration Date</label>
            <input type="text" id="expiration" name="expiration" class="datepicker form-control{{ $errors->has('expiration') ? ' is-danger' : '' }}" value="{{ $notification->expiration }}">
        </div>

        @include('components.errors')

        <button class="btn btn-primary" type="submit">Update</button>

    </form>

    <form method="POST" action="/notifications/{{ $notification->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn-delete">Delete</button>
    </form>
@endsection