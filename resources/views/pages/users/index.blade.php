@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">👥 All Users with Domains</h2>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">👤 Name</th>
                    <th scope="col">📧 Email</th>
                    <th scope="col">💼 Plan</th>
                    <th scope="col">🌐 Domains</th>
                    <th scope="col">🕒 Registered At</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $planName = $user->plan->plan_name ?? 'None';
                            @endphp

                            @if($planName === 'Premium')
                                <span class="badge bg-warning text-dark">{{ $planName }}</span>
                            @elseif($planName === 'Standart')
                                <span class="badge bg-success">{{ $planName }}</span>
                            @else
                                <span class="badge bg-primary">{{ $planName }}</span>
                            @endif

                        </td>
                        <td>
                            @if($user->domains->isNotEmpty())
                                <ul class="list-unstyled mb-0 text-start">
                                    @foreach($user->domains as $domain)
                                        <li>🔗 {{ $domain->domain }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No domains</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No users found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Пагинация -->
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
