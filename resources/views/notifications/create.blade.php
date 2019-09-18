@extends('layouts.dashboard')

@section('title', 'Add New Notification')

@section('content')
    <h1>Add New Notification</h1>
    <form method="POST" action="/notifications">
        {{ method_field('POST') }}
        {{ csrf_field() }}



        <div class="form-group">
            <label for="site_id">Website</label>
            <select class="form-control" id="site_id" name="site_id">
                <option>Select One</option>

                @foreach ($sites as $site)

                    @if ($site->id > 0)
                        <option value="{{ $site->id }}" {{ old('site_id') == $site->id ? ' selected' : '' }}>{{ $site->site_name }}</option>
                    @endif

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="service_id">Service Type</label>
            <select class="form-control" id="service_id" name="service_id">
                <option value="">Select One</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach

                {{--<option value="select one" {{ old('type') == 'select one' ? ' selected' : '' }}>Select One</option>
                <option value="certificate" {{ old('type') == 'certificate' ? ' selected' : '' }}>Certificate</option>
                <option value="domain name" {{ old('type') == 'domain name' ? ' selected' : '' }}>Domain Name</option>
                <option value="web hosting" {{ old('type') == 'web hosting' ? ' selected' : '' }}>Web Hosting</option>--}}
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="expiration">Expiration Date</label>
            <input type="text" id="expiration" name="expiration" class="datepicker form-control" value="{{ old('expiration') }}" required>
        </div>

        @include('components.errors')

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <p class="btn-cancel"><a href="/">Cancel</a></p>
@endsection