@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Users List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Email</th>
                <th>Email Verified At</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at ? $user->email_verified_at->format('d M, Y H:i') : 'Not Verified' }}</td>
                <td>{{ $user->created_at->format('d M, Y H:i') }}</td>
                <td>{{ $user->updated_at->format('d M, Y H:i') }}</td>
                <td>
                    <!-- Actions like Edit, Delete -->
                    <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <!-- Add more actions as needed -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
