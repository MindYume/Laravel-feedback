@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Feedback panel</div>

                <div class="card-body">

                    <form action="{{ route('application.add') }}" method="POST">
                        @csrf
                        <input class="w-50 p-1" type="text" name="application_title" placeholder="Application title"><br><br>
                        <input class="w-25 p-1" type="text" name="name" placeholder="Name">
                        <input class="w-25 p-1"type="text" name="phone_number" placeholder="Phone number">
                        <input class="w-25 p-1" type="text" name="company" placeholder="Company"><br><br>
                        <textarea cols=100 rows=5 name="message" placeholder="Message"></textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div><br>
        </div>

        @if (Auth::user()->feedbacks)
            @foreach (Auth::user()->feedbacks->all() as $feedback)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ $feedback->application_title }}
                            <form action="{{ route('application.delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="application_id" value="{{$feedback->id}}">
                                <button class="float-end" type="submit">delete</button>
                            </form>
                        </div>

                        <div class="card-body">
                            <div>Name: {{ $feedback->name }}</div>
                            <div>Phone_number: {{ $feedback->phone_number }}</div>
                            <div>Company: {{ $feedback->company }}</div>
                            <textarea cols=100 rows=5 readonly>Message: {{ $feedback->message }}</textarea>
                        </div>
                    </div><br>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
