@extends('layout.admin_layout')

@section('header')

    @parent

@endsection

@section('content')

    <div class="row">

        <div class="col-10"></div>

        <div class="col-2">

            <a href="{{ url('admin/fish-table') }}">
                <button class="btn btn-danger"><span class="oi oi-x">Отмена</span></button>
            </a>

            <a href="#">
                <button class="btn btn-primary"><span class="oi oi-pencil">Сохранить</span></button>
            </a>

        </div>

    </div>

    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">


            <form action="{{ route('create_new_fish') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label col-form-label-lg" for="">Включено</label>

                    <div class="col-sm-3">

                        <select class="form-control form-control-lg" class="form-control" name="enabled">
                            <option value="1">Опубликовано</option>
                            <option value="0">Не опубликовано</option>
                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label col-form-label-lg" for="">Категрия</label>

                    <div class="col-sm-3">

                        <input class="form-control form-control-lg" type="text" class="form-control" name="category_id"
                               required>

                    </div>

                </div>
                @php($languages = ['ua','ru','en'])

                @foreach($languages as $lang)

                    <button id="hide_div_{{ $lang }}">{{ strtoupper($lang) }}</button>

                @endforeach


                @foreach($languages as $lang)

                    <div id="div_{{ $lang }}">

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label col-form-label-lg" for="">Название на {{ $lang }}</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="name[{{ $lang }}]" required>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label col-form-label-lg" for="">Краткое описание на {{ $lang }}</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="short_description[{{ $lang }}]" required>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label col-form-label-lg" for="">Описание на {{ $lang }}</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="description[{{ $lang }}]" required>

                            </div>

                        </div>
                    </div>

                @endforeach

            </form>

        </div>

    </div>

    <script>

        $('#div_ru').hide();
        $('#div_en').hide();
        $('#hide_div_ua').addClass('btn btn-primary');

        $('#hide_div_ua').click(function (event) {
            event.preventDefault();
            $('#div_ua').show();
            $('#div_ru').hide();
            $('#div_en').hide();
            $(this).addClass('btn btn-primary');
            $('#hide_div_ru').removeClass('btn btn-primary');
            $('#hide_div_en').removeClass('btn btn-primary');
        });

        $('#hide_div_ru').click(function (event) {
            event.preventDefault();
            $('#div_ua').hide();
            $('#div_ru').show();
            $('#div_en').hide();
            $(this).addClass('btn btn-primary');
            $('#hide_div_ua').removeClass('btn btn-primary');
            $('#hide_div_en').removeClass('btn btn-primary');
        });

        $('#hide_div_en').click(function (event) {
            event.preventDefault();
            $('#div_ua').hide();
            $('#div_ru').hide();
            $('#div_en').show();
            $(this).addClass('btn btn-primary');
            $('#hide_div_ua').removeClass('btn btn-primary');
            $('#hide_div_ru').removeClass('btn btn-primary');
        });

    </script>
@endsection





