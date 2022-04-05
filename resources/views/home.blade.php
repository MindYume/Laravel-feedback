@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('applications') }}">Список заявок</a>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель обратной связи</div>

                <div class="card-body">

                    <form action="{{ route('application.add') }}" method="POST" enctype="multipart/form-data" > 
                        @csrf
                        <input class="w-50 p-1" type="text" name="application_title" placeholder="Название заявки"><br><br>
                        <input class="w-25 p-1" type="text" name="name" placeholder="Имя">
                        <input class="w-25 p-1"type="text" name="phone_number" placeholder="Номер телефона">
                        <input class="w-25 p-1" type="text" name="company" placeholder="Компания"><br><br>
                        <input type="file" class="form-control-file" name="file"><br><br>
                        <textarea cols=100 rows=5 name="message" placeholder="Сообщение"></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
            </div><br>
        </div>

    </div>
</div>
@endsection
