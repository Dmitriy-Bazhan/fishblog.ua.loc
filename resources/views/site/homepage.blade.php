@extends('layout.layout')


@section('content')

    @if(isset($popular_fishes))

        <h2>Популярный рыбы</h2>

        <div class="container-fluid">
            <div class="row justify-content-md-center">

                @foreach($popular_fishes as $fish)

                    <div class="col-3" style="background-color: lightgrey; margin: 5px;">
                        <p>{{ $fish->fish_data[lang_number()]->name }}</p>

                        <img src="{{ asset('images/logo.jpg') }}"/>

                        <p>{{ $fish->fish_data[lang_number()]->short_description }}</p>
                    </div>

                @endforeach

            </div>
        </div>

    @endif

    @if(isset($popular_lakes))

        <h2>Популярный водоемы</h2>

        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <h1></h1>

                @foreach($popular_lakes as $lake)

                    <div class="col-3" style="background-color: lightgrey; margin: 5px;">
                        <p>{{ $lake->lake_data[lang_number()]->name }}</p>

                        <img src="{{ asset('images/logo.jpg') }}"/>

                        <p>{{ $lake->lake_data[lang_number()]->short_description }}</p>
                    </div>

                @endforeach

            </div>
        </div>

    @endif

    <h2>Карта</h2>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div style="background-color: lightgrey; margin: 5px;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d41060.5515124976!2d36.3676222!3d49.96852354999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1588000417257!5m2!1sru!2sua"
                    width="1200" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
@endsection

