@extends('layouts.dashboard')

@section('title', 'Add New Site')

@section('content')

    <div class="portlet">

    <h1>Add New Site</h1>

    <form method="POST" action="/sites">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="site_name">Website Name</label>
            <input type="text" name="site_name" class="form-control input{{ $errors->has('site_name') ? ' alert-danger' : '' }}"  value="{{ old('site_name') }}" placeholder="Site Name">
        </div>

        <div class="form-group">
            <label for="site_name">Website URL</label>
            <input type="text" name="site_url" class="form-control input{{ $errors->has('site_url') ? ' alert-danger' : '' }}" aria-describedby="siteUrlHelp" value="{{ old('site_url') }}" placeholder="Site URL">
            <small id="siteUrlHelp" class="form-text text-muted">Example http://google.com or https://google.com</small>
        </div>

        <div class="form-group">
            <label for="site_description">Description</label>
            <textarea class="form-control" id="site_description" name="site_description">{{ old('site_description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="client_status">Client Status</label>
            <select class="form-control" id="client_status" name="client_status">
                <option {{ old('client_status') == 'ACTIVE' ? ' selected' : '' }}>ACTIVE</option>
                <option {{ old('client_status') == 'NOT ACTIVE' ? ' selected' : '' }}>NOT ACTIVE</option>
            </select>
        </div>

        @include('components.errors')

        <button class="btn btn-primary" type="submit">Submit</button>

    </form>

    <p class="btn-delete"><a href="/sites">Cancel</a></p>

    </div>

@endsection