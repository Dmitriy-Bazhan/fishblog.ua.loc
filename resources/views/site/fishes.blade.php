@extends('layout.layout')


@section('content')

    @if(isset($fishes))

        <div class="container-fluid" style="margin-top: 3%">
            <div class="row justify-content-md-center">

                @foreach($fishes as $fish)

                    <div class="col-3" style="background-color: lightgrey; margin: 5px; padding: 5px; ">
                        <p>{{ $fish->fish_data[lang_number()]->name }}</p>

                        <img src="{{ asset('images/logo.jpg') }}" style="width: 100%;"/>

                        <p>{{ $fish->fish_data[lang_number()]->short_description }}</p>
                    </div>

                @endforeach

            </div>
        </div>

    @endif




@endsection
