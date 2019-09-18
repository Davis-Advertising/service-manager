@extends('layouts.dashboard')

@section('title', 'Sites')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>Users</h1>

    <table class="table">
        <tbody>
        <tr>
            <td>Name</td>
            <td>Role</td>
            <td>Date Created</td>
        </tr>


        @foreach ($users as $user)
            <tr>
                <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                <td>
                    @if(!empty($user->roles))
                        @foreach ( $user->roles as $roles)
                            {{ UserRole::getRoleList()[ $roles ] }}
                        @endforeach
                    @endif
                </td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <p><a href="/users/create" class="btn btn-primary">Add New User</a></p>

@endsection
