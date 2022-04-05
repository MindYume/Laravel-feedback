@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in, {{Auth::user()->name}}!

                    @if (Auth::user()->feedbacks)
                        <ul>
                            @foreach (Auth::user()->feedbacks->all() as $feedback)
                                <li>{{ $feedback->msg_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
