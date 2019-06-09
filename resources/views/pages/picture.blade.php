@extends('layout')

@section('title', $picture->title)
@section('meta_description', $picture->description)
@section('description', $picture->description)
@section('picture', $picture->getPicture())

@section('content')
    <div class="box">
        <a href="/">
            <button type="submit" class="btn btn-dark">Перейти на главную страницу</button>
        </a>
        <div class="box-body">
            <div class="col-md-1"></div>
            <div class="col-md-10 text-center">
                <div class="form-group">
                    <label>Название</label>
                    <p>{{$picture->title}}</p>
                </div>
                <hr>
                <div class="form-group">
                    <label>Описание</label>
                    <p>{{$picture->description}}</p>
                </div>
                <hr>

                <div class="form-group">
                    <img src="{{$picture->getPicture()}}" alt="" class="img-responsive" width="30%">
                </div>
                <hr>
                <a href="/formAddPicture">
                    <button class="btn btn-warning pull-right">Добавить новую картинку</button>
                </a>
                <div class="container">
                    <br>
                        <h4 class="text-center">Поделиться:</h4>
                    <div class="ya-share2" data-services="vkontakte,facebook,twitter"></div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection