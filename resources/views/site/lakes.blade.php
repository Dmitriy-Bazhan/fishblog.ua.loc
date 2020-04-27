@extends('layout.layout')


@section('content')

    @if(isset($lakes))

        <div class="container-fluid">
            <div class="row justify-content-md-center">

                @foreach($lakes as $lake)

                    <div class="col-3" style="background-color: lightgrey; margin: 5px;">
                        <p>{{ $lake->lake_data[lang_number()]->name }}</p>

                        <img src="{{ asset('images/logo.jpg') }}"/>

                        <p>{{ $lake->lake_data[lang_number()]->short_description }}</p>
                    </div>

                @endforeach

            </div>
        </div>

    @endif




@endsection
