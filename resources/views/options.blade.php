@extends('layouts.dashboard')

@section('title', 'Options')

@section('content')

    <h1>Site Options</h1>

    <div id="tabs">

        <ul>
            <li><a href="#tabs-1">Email</a></li>
            <li><a href="#tabs-2">Backup / Restore</a></li>
        </ul>

        <div id="tabs-1">
            <input type="checkbox" name="notifications" value="Yes"> Receive Notifications
        </div>
        <div id="tabs-2">
            <h2>Export Site</h2>
            <p>Export sites list to an Excel file.</p>
            <form method="POST" action="/export">
                {{ csrf_field() }}

                <button class="btn btn-primary" type="submit">Export</button>
            </form>

            <h2>Import Site</h2>
            <p>Import sites list to an Excel file.</p>
            <form method="POST" action="/import" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="import_file">Attach file to import</label>
                    <input type="file" class="form-control-file" name="import_file" id="import_file">
                </div>
                <button class="btn btn-primary" type="submit">Import</button>
            </form>
        </div>

    </div>



@endsection

