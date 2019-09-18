@extends('layouts.dashboard')

@section('title', 'Notifications')

@section('content')
    <h1>View All Notifications</h1>

    <table class="table">
        <tbody>
        <tr>
            <td>Site</td>
            <td>Type</td>
            <td>Expiration</td>
            <td>&nbsp;</td>
        </tr>

        @foreach ($notifications as $notification)
        <tr>
            @foreach ($sites as $site)

                @if ($site->id == $notification->site_id)
                    <td>{{ $site->site_name }}</td>
                @endif

            @endforeach

            @foreach ($services as $service)
                @if ($notification->service_id == $service->id)
                    <td>{{ $service->name }}</td>
                @endif
            @endforeach

            <td>{{ $notification->expiration }}</td>
            <td><a href="/notifications/{{ $notification->id  }}/edit" class="edit"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <p><a href="/notifications/create" class="btn btn-primary">New Notification</a></p>

@endsection