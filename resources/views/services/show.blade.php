@extends('layouts.dashboard')

@section('title')
    Site - {{ $site->site_name }}
@endsection

@section('content')

    <h1>{{ $site->site_name }}</h1>

    <p>{{ $site->site_description }}</p>



    @if ($site->notes->count())
    <div>
        @foreach ($site->notes as $note)
            <form method="POST" action="/notes/{{ $note->id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <label for="completed" class="checkbox{{ $note->completed ? ' is-complete' : '' }}">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $note->completed ? 'checked' : '' }}>
                    {{ $note->description }}
                </label>
            </form>
        @endforeach
    </div>
    @endif



    @if ($site->notifications->count())
        <h2>Notifications</h2>
        <table class="table">
            <tr>
                <td>Type</td>
                <td>Expiration</td>
                <td>Description</td>
                <td>&nbsp;</td>
            </tr>
        @foreach ($site->notifications->sortBy('type') as $notification)
            <tr>
                <td>{{ ucwords($notification->type) }}</td>
                <td>
                    {{ date('F j, Y', strtotime($notification->expiration)) }}

                    <?php

                    $expiration = new DateTime($notification->expiration);

                    $expires = strtotime($expiration->format('Y-m-d H:i:s'));
                    //$expiration = strtotime($expiration->date);
                    $currentDate = strtotime($date);

                    $interval = $date->diff($expiration);
                    $remainingDays = $interval->format('%r%a');

                    /*echo $expires;
                    echo $currentDate;*/

                    // 2019-01-09 20:42:49
                    // echo $date;
                  //echo $currentDate;
                  //echo $expiration;

                    if ($currentDate < $expires) {

                        if ($remainingDays == 0) {
                            echo '(Expires today)';
                        } elseif($remainingDays == 1) {
                            echo '(Expires in ' . $remainingDays . ' day)';
                        } else {
                            echo '(Expires in ' . $remainingDays . ' days)';
                        }

                    } else {
                        echo '(Service has expired)';
                    }

                    ?>
                </td>
                <td>{{ $notification->description  }}</td>
                <td><a href="/notifications/{{ $notification->id  }}/edit">Edit</a></td>
            </tr>
        @endforeach
        </table>
    @endif


    <?php

   /* $now = new DateTime();
   echo $now->date;*/
    //$interval = $now->diff($notification->expiration);
    //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
    //echo $elapsed;
    //print_r($now);
    //echo $now;
    ?>

    {{--<form method="POST" action="/sites/{{ $site->id }}/notes">
        {{ method_field('POST') }}
        {{ csrf_field() }}

        <label for="description">Note</label>
        <input type="text" name="description">
        <button type="submit">Add Note</button>
    </form>--}}

    @include ('errors')

    <p><a href="/sites/{{ $site->id }}/edit" class="btn btn-primary">Edit Site</a></p>

@endsection