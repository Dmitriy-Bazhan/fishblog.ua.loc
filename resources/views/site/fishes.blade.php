@extends('layout.layout')


@section('content')

    @if(isset($fishes))

        <div class="container-fluid">
            <div class="row justify-content-md-center">

                @foreach($fishes as $fish)

                    <div class="col-3" style="background-color: lightgrey; margin: 5px;">
                        <p>{{ $fish->fish_data[lang_number()]->name }}</p>

                        <img src="{{ asset('images/logo.jpg') }}"/>
                        
                        <p>{{ $fish->fish_data[lang_number()]->short_description }}</p>
                    </div>

                @endforeach

            </div>
        </div>

    @endif




@endsection
