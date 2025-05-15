@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Domains</h2>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('domains.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="domain" class="form-control" placeholder="Enter domain (e.g., google.com)" required>
                <button class="btn btn-primary" type="submit">Add Domain</button>
            </div>
        </form>

        <ul class="list-group">
            @forelse ($domains as $domain)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form action="{{ route('domains.update', $domain->id) }}" method="POST" class="d-flex align-items-center w-100">
                        @csrf
                        @method('PUT')
                        <input type="text" name="domain" class="form-control me-2" value="{{ $domain->domain }}">
                        <button class="btn btn-sm btn-success me-2" type="submit">Update</button>
                    </form>
                    <form action="{{ route('domains.destroy', $domain->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </li>
            @empty
                <li class="list-group-item">You have no domains yet.</li>
            @endforelse
        </ul>

    </div>
@endsection
