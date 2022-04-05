@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('home') }}">Форма обратной связи</a>
        @if (count(Auth::user()->feedbacks) > 0)
            @foreach (Auth::user()->feedbacks->all() as $feedback)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ $feedback->application_title }}
                            <form action="{{ route('application.delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="application_id" value="{{$feedback->id}}">
                                <button class="float-end" type="submit">Удалить заявку</button>
                            </form>
                        </div>

                        <div class="card-body">
                            <div>Имя: {{ $feedback->name }}</div>
                            <div>Номер телефона: {{ $feedback->phone_number }}</div>
                            <div>Компания: {{ $feedback->company }}</div>
                            @if ($feedback->file_path == "No file")
                                <div>Файл: нет файла</div>
                            @else
                                <div>Файл: <a href="{{ $feedback->file_path }}">{{ $feedback->file_name }}</a></div>
                            @endif
                            <textarea cols=100 rows=5 readonly>Сообщение: {{ $feedback->message }}</textarea>
                        </div>
                    </div><br>
                </div>
            @endforeach
        @else
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        У вас нет заявок. 
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
