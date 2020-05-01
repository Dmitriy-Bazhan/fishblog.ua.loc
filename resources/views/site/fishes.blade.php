@extends('layout.layout')


@section('content')

    @if(isset($fishes))


        @if($viewport == 'desktop')
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

            <div class="container-fluid">

                <div class="row justify-content-md-center">

                        {{ $fishes->links('vendor.pagination.default') }}

                </div>

            </div>
        @elseif($viewport == 'mobile')
            <div class="container-fluid" style="margin-top: 50%">
                <div class="row justify-content-sm-center">

                    @foreach($fishes as $fish)
                        <div class="col-1"></div>
                        <div class="col-10" style="background-color: lightgrey; margin: 15px; padding: 5px; ">
                            <p>{{ $fish->fish_data[lang_number()]->name }}</p>

                            <img src="{{ asset('images/logo.jpg') }}" style="width: 100%;"/>

                            <p>{{ $fish->fish_data[lang_number()]->short_description }}</p>
                        </div>

                    @endforeach

                </div>
            </div>


        @endif
    @endif




@endsection
