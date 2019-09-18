@extends('layouts.dashboard')

@section('title')
    Edit {{ $site->site_name }}
@endsection

@section('content')

    <h1>Edit Site</h1>

    <form method="POST" action="/sites/{{ $site->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="site_name">Website Name</label>
            <input type="text" name="site_name" class="form-control input{{ $errors->has('site_name') ? ' is-danger' : '' }}"  value="{{ $site->site_name }}" placeholder="Site Name">
        </div>

        <div class="form-group">
            <label for="site_name">Website URL</label>
            <input type="text" name="site_url" class="form-control input{{ $errors->has('site_url') ? ' is-danger' : '' }}" aria-describedby="siteUrlHelp" value="{{ $site->site_url }}" placeholder="Site URL">
            <small id="siteUrlHelp" class="form-text text-muted">Example http://google.com or https://google.com</small>
        </div>

        <div class="form-group">
            <label for="site_description">Description</label>
            <textarea class="form-control" id="site_description" name="site_description">{{ $site->site_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="client_status">Client Status</label>
            <select class="form-control" id="client_status" name="client_status">
                <option {{ $site->client_status == 'ACTIVE' ? ' selected' : '' }}>ACTIVE</option>
                <option {{ $site->client_status == 'NOT ACTIVE' ? ' selected' : '' }}>NOT ACTIVE</option>
            </select>
        </div>

        {{--<div class="form-group">
            <label for="domain_name">Domain Name</label>
            <input type="text" id="domain_name" name="domain_name" class="datepicker form-control" value="{{ $site->notifications[0]->expiration }}">
        </div>--}}

        @foreach ($site->notifications as $notification)

            @if ($notification->type == 'domain name')
                <div class="form-group">
                    <label for="domain_name">Domain Name</label>
                    <input type="text" id="domain_name" name="domain_name" class="datepicker form-control" value="{{ isset($notification->type) == 'domain name' ? $notification->expiration : '' }}">
                </div>
            @endif

                @if ($notification->type == 'certificate')
                    <div class="form-group">
                        <label for="ssl_certificate">SSL Certificate</label>
                        <input type="text" id="ssl_certificate" name="ssl_certificate" class="datepicker form-control" value="{{ isset($notification->type) == 'certificate' ? $notification->expiration : '' }}">
                    </div>
                @endif

                @if ($notification->type == 'web hosting')
                    <div class="form-group">
                        <label for="web_hosting">Web Hosting</label>
                        <input type="text" id="web_hosting" name="web_hosting" class="datepicker form-control" value="{{ isset($notification->type) == 'web hosting' ? $notification->expiration : '' }}">
                    </div>
                @endif

        @endforeach

        @include('components.errors')

        <button class="btn btn-primary" type="submit">Update</button>

    </form>

    <form method="POST" action="/sites/{{ $site->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn-delete" type="submit">Delete</button>
    </form>
@endsection