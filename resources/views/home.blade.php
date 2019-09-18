@extends('layouts.dashboard')

@section('title', 'Sites')

@section('content')

    <div class="portlet">

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>Managed Sites</h1>

    @foreach ($sites as $site)

        <div class="domain">
            <div class="row">
                <div class="col-11"><h2>{{ $site->site_name }}</h2></div>
                <div class="col-1"><a href="/sites/{{ $site->id  }}/edit" class="edit"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg></a></div>
            </div>

            <div class="row">

                @foreach ($notifications as $notification)

                    @if ($notification->site_id == $site->id)

                        <div class="col-3">

                            <div class="row domain__status">
                                <div class="col-2">

                                    @include('sites.status', ['expiration' => $notification->expiration])

                                </div>
                                <div class="col-10">

                                    @foreach ($services as $service)

                                        @if ($notification->service_id == $service->id)
                                            <h3>{{ $service->name }}</h3>
                                        @endif

                                    @endforeach

                                    <p>Expires {{ Carbon\Carbon::parse( $notification->expiration )->formatLocalized('%B %d, %Y') }}</p>

                                        <div class="dropdown dropright">
                                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <form method="POST" action="/notifications/{{ $notification->id }}/edit">
                                                    {{ method_field('PATCH') }}

                                                    {{ csrf_field() }}

                                                    <label for="datepicker-{{ $notification->id }}">Renewal Date</label>
                                                    <input type="text" id="datepicker-{{ $notification->id }}" name="expiration" class="datepicker form-control" value="{{ Carbon\Carbon::parse( $notification->expiration )->format('Y-m-d') }}">
                                                    <label>Renew in:</label>
                                                    <button type="button" class="btn btn-warning btn-sm renew-30-days">90 days</button>
                                                    <button type="button" class="btn btn-warning btn-sm renew-1-year">1 Year</button>
                                                    <button type="button" class="btn btn-warning btn-sm renew-2-years">2 Years</button>

                                                    @include ('/components.errors')

                                                    <input type="submit" value="Update" class="btn btn-primary">
                                                </form>
                                            </div>
                                        </div>

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach
            </div>
        </div>

    @endforeach

    </div>

@endsection