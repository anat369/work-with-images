@extends('layout')

@section('title', 'Страница добавления картинки')

@section('content')
    <br>

    <a href="/">
        <button type="submit" class="btn btn-dark">Перейти на главную страницу</button>
    </a>

    {!! Form::open([
        'route' => 'addPicture',
        'files'	=>	true,
        'class' => 'text-center',
        ]) !!}
    <div class="form-group">
        <label for="title">Введите название</label>
        <input class="form-control" id="title" placeholder="Не более 300 символов" name="title">
    </div>
    <div class="form-group">
        <label for="description">Введите описание</label>
        <input class="form-control" id="description" placeholder="Не более 800 символов" name="description">
    </div>
    <div class="form-group">
        <label for="text">Введите текст для нанесения на картинку</label>
        <input class="form-control" type="text" id="text" name="text" placeholder="Не более 30 символов" />
    </div>

    <div class="container">
        <div class="row">
            <div class="form-group col-md-6">
                <select name="color" style=" display: block;
                                            width: 100%;
                                            height: calc(1.5em + 0.75rem + 2px);
                                            padding: 0.375rem 0.75rem;
                                            font-size: 1rem;
                                            font-weight: 400;
                                            line-height: 1.5;
                                            background-color: #fff;
                                            background-clip: padding-box;
                                            border: 1px solid #ced4da;
                                            border-radius: 0.25rem;
                                            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                    <option disabled selected>Выберите цвет текста</option>
                    <option value="red" style="color: red !important;">Красный</option>
                    <option value="blue" style="color: blue !important;">Синий</option>
                    <option value="black" style="color: black !important;">Черный</option>
                    <option value="orange" style="color: orange !important;">Оранжевый</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <select name="font" class="form-control select2">
                    <option disabled selected>Выберите шрифт текста</option>
                    <option value="1" style="font-family:Bad Script;">Образец 1</option>
                    <option value="2" style="font-family:Anastasia Script;">Образец 2</option>
                    <option value="3" style="font-family:Roboto;font-weight:bold">Образец 3</option>
                    <option value="4" style="font-family:Open Sans Condensed;">Образец 4</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="picture">Выберите файл (только картинка, размеры изображения не более 800*800 и размером файла не более 500kb)</label>
        <input id="picture" type="file" name="picture">
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>
    {!! Form::close() !!}

@endsection