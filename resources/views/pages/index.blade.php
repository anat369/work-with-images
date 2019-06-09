@extends('layout')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">Каталог картинок</h3>
                <br>
                <div class="container text-center">
                    <a href="/formAddPicture">
                        <button type="submit" class="btn btn-danger">Добавить новую картинку</button>
                    </a>
                </div>
                <br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Картинка</th>
                        <th>Название <br>(нажмите для перехода)</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    @foreach($pictures as $picture)
                        <tr>
                            <td>
                                <img src="{{$picture->getPicture()}}" alt="" width="90"
                                     style="border:2px solid darkblue">
                            </td>
                            <td><a href="/viewPicture/{{$picture->id}}">{{ $picture->title}}</a></td>
                            <td>{{ $picture->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection