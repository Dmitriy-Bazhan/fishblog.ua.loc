@extends('layout.layout')

@section('header')
    @parent
@endsection

@section('content')

    {{--    @if(app()->getLocale() == 'ru')--}}

    <div id="contacts-content" class="container {{ $body_class }}">
        <div class="" id="send-job-modal" tabindex="-1" role="dialog"
             aria-labelledby="send-job-modalTitle" aria-hidden="true">
            <div class="" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="login_form" action="{{ route('login_form') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row text-center">
                                <div class="col-sm-12">
                                    <h4 class="">Вход</h4>
                                    <h6 class="error text-center"
                                        style="color: red">{{ session()->has('user_not_found') ? 'Такого пользователя не существует' : '' }}</h6>
                                </div>
                                <div class="mx-auto col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <input type="text" class="tr-all form-control" name="email" value=""
                                                   placeholder="E-mail" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-4">
                                            <input type="password" class="tr-all form-control" name="password"
                                                   placeholder="Пароль" autocomplete="off" value=""
                                                   style="border-radius: 0px; height: 48px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <div class="col-sm-12 text-center">
                            <button type="button" id="login_btn" class="btn btn-primary" style="margin-top: -140px;">
                                Войти
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    @elseif(app()->getLocale() == 'ua')--}}

    {{--        <div id="contacts-content" class="container {{ $body_class }}">--}}

    {{--            <div class="" id="send-job-modal" tabindex="-1" role="dialog"--}}
    {{--                 aria-labelledby="send-job-modalTitle" aria-hidden="true">--}}
    {{--                <div class="" role="document">--}}
    {{--                    <div class="modal-content">--}}

    {{--                        <div class="modal-body">--}}
    {{--                            <form id="login_form" action="{{ route('authenticate') }}" method="post">--}}
    {{--                                @csrf--}}
    {{--                                <div class="row text-center">--}}

    {{--                                    <div class="col-sm-12">--}}

    {{--                                        <h4 class="">Вхід</h4>--}}
    {{--                                        <h6 class="error text-center" style="color: red">{{ session()->has('user_not_found') ? 'Такого користувача не існує' : '' }}</h6>--}}
    {{--                                    </div>--}}

    {{--                                    --}}{{--<div class="loader"><!-- Place at bottom of page --></div>--}}


    {{--                                    <div class="mx-auto col-6">--}}

    {{--                                        <div class="form-group">--}}

    {{--                                            <div class="input-group mb-4">--}}

    {{--                                                <input type="text" class="tr-all form-control" name="email" value=""--}}
    {{--                                                       placeholder="E-mail" autocomplete="off" >--}}

    {{--                                            </div>--}}

    {{--                                            <div class="input-group mb-4">--}}

    {{--                                                <input type="password" class="tr-all form-control" name="password"--}}
    {{--                                                       placeholder="Пароль" autocomplete="off" value="" style="border-radius: 0px; height: 48px">--}}

    {{--                                            </div>--}}

    {{--                                        </div>--}}

    {{--                                    </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}

    {{--                    <div class="modal-footer">--}}

    {{--                        --}}{{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}

    {{--                        <div class="col-sm-12 text-center">--}}

    {{--                            <button type="button" id="login_btn"--}}
    {{--                                    class="btn btn-primary" style="margin-top: -140px;">Увійти--}}
    {{--                            </button>--}}

    {{--                        </div>--}}

    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}

    {{--        </div>--}}

    {{--    @elseif(app()->getLocale() == 'en')--}}

    {{--        <div id="contacts-content" class="container {{ $body_class }}">--}}

    {{--            <div class="" id="send-job-modal" tabindex="-1" role="dialog"--}}
    {{--                 aria-labelledby="send-job-modalTitle" aria-hidden="true">--}}
    {{--                <div class="" role="document">--}}
    {{--                    <div class="modal-content">--}}

    {{--                        <div class="modal-body">--}}
    {{--                            <form id="login_form" action="{{ route('authenticate') }}" method="post">--}}
    {{--                                @csrf--}}
    {{--                                <div class="row text-center">--}}

    {{--                                    <div class="col-sm-12">--}}

    {{--                                        <h4 class="">Sign in</h4>--}}
    {{--                                        <h6 class="error text-center" style="color: red">{{ session()->has('user_not_found') ? 'This user does not exist' : '' }}</h6>--}}
    {{--                                    </div>--}}

    {{--                                    --}}{{--<div class="loader"><!-- Place at bottom of page --></div>--}}


    {{--                                    <div class="mx-auto col-6">--}}

    {{--                                        <div class="form-group">--}}

    {{--                                            <div class="input-group mb-4">--}}

    {{--                                                <input type="text" class="tr-all form-control" name="email" value=""--}}
    {{--                                                       placeholder="E-mail" autocomplete="off" >--}}

    {{--                                            </div>--}}

    {{--                                            <div class="input-group mb-4">--}}

    {{--                                                <input type="password" class="tr-all form-control" name="password"--}}
    {{--                                                       placeholder="Password" autocomplete="off" value="" style="border-radius: 0px; height: 48px">--}}

    {{--                                            </div>--}}

    {{--                                        </div>--}}

    {{--                                    </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}

    {{--                    <div class="modal-footer">--}}

    {{--                        --}}{{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}

    {{--                        <div class="col-sm-12 text-center">--}}

    {{--                            <button type="button" id="login_btn"--}}
    {{--                                    class="btn btn-primary" style="margin-top: -140px;">Submit--}}
    {{--                            </button>--}}

    {{--                        </div>--}}

    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}

    {{--        </div>--}}

    {{--    @endif--}}

    <script>
        $('.modal-content').on('click','#login_btn',function (event) {
            // $data = $('form');
            // console.log($data.serialize());
             $('form').submit();
        });
    </script>

@endsection
