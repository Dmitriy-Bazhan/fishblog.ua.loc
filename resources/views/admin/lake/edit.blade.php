@extends('layout.admin_layout')

@section('header')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <a href="{{ url('admin/lake-table') }}">
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
            <form action="{{ url('admin/update_lake') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="alias_form" class="col-sm-1 col-form-label col-form-label-lg">Алиас</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="alias_form" name="alias"
                               value="{{ (isset($lake->alias) ? $lake->alias : '') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location_form" class="col-sm-1 col-form-label col-form-label-lg">Локация</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="location_form" name="location"
                               value="{{ (isset($lake->location_id) ? $lake->location_id : '') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo_form" class="col-sm-1 col-form-label col-form-label-lg">Фото</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="photo_form" name="photo"
                               value="{{ (isset($lake->photo) ? $lake->photo : '') }}">
                    </div>
                </div>





                {{--                <div>--}}

                {{--                </div>--}}

                {{--                <div>--}}

                {{--                </div>--}}

                {{--                <div>--}}

                {{--                </div>--}}


                <input type="submit" value="send">
            </form>
        </div>
    </div>

    {{--            {{ dd($lake->toArray()) }}--}}

@endsection

<script>

</script>
