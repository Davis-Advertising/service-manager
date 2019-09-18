



    <p>These services will be expiring soon:</p>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Service</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($notifications as $notification)
            <tr>
                <td>
                    @foreach ($sites as $site)

                        @if ($notification->site_id == $site->id)
                            {{ $site->site_name }}
                        @endif

                    @endforeach
                </td>
                <td>
                    @foreach ($services as $service)

                        @if ($notification->service_id == $service->id)
                            {{ $service->name }}
                        @endif

                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {{--@if ($site->first)
        These certificates are set to expire soon:
    @endif--}}

    {{--@if ($current_date > $site->ssl_renew_date)
        {{ $site->site_name }} - {{ $site->ssl_renew_date }} <br>
    @endif--}}

