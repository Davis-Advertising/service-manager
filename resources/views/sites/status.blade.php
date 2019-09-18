<?php

$date = Carbon\Carbon::now();
$difference = Carbon\Carbon::parse( $notification->expiration )->diffInDays( $date );

?>

{{--{{ Carbon\Carbon::parse( $notification['expiration'] )->subDays(29) }}--}}

@if ($expiration)

    @switch($expiration)

        @case($expiration < $date)
            <span class="status status-expired" title="Service Expired"></span>
        @break

        @case( $expiration > $date && $difference < 3)
            <span class="status status-expiring-soon" title="Service Expiring Soon"></span>
        @break

        @case($expiration > $date && $difference > 3)
            <span class="status status-ok" title="Expiring in {{ $difference }} days"></span>
        @break

    @endswitch

@endif