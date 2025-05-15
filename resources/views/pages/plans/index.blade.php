@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-light text-center">🌟 Choose Your Plan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <h5 class="text-center mb-5 text-dark">
            Your active plan is:
            <span class="badge bg-info text-dark">
                {{ $user->plan->plan_name ?? 'None' }}
            </span>
        </h5>

        <div class="row justify-content-center">
            @foreach($plans as $plan)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-lg h-100 border-0">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="my-1">{{ $plan->plan_name }}</h4>
                            <h5 class="fw-light">${{ number_format($plan->price, 2) }}</h5>
                        </div>

                        <div class="card-body d-flex flex-column">
                            @if(is_array($plan->features) && count($plan->features))
                                <ul class="list-group list-group-flush mb-3">
                                    @foreach($plan->features as $feature)
                                        <li class="list-group-item">
                                            ✅ {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No features listed.</p>
                            @endif
                        </div>

                        <div class="card-footer bg-white border-0 text-center">
                            @if($user->plan_id === $plan->id)
                                <button class="btn btn-outline-secondary w-100" disabled>✔ Current Plan</button>
                            @else
                                <form method="POST" action="{{ route('plans.subscribe', $plan->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100">Buy Plan</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
