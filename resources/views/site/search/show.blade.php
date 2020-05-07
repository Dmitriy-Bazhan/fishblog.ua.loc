@extends('layout.layout')

@section('content')

    @if(isset($results))

        @if($viewport == 'desktop')

            <div class="container-fluid" style="margin-top: 3%">

                <div class="row justify-content-md-center">

                    @foreach($results as $result)

                        @php($class = !empty($result) ? strtolower(substr(get_class($result), 4, strlen(get_class($result)))) . '_data' : null)

                        <div class="col-3" style="background-color: lightgrey; margin: 5px; padding: 5px; ">

                            <p>{{ $result[$class][lang_number()]->name }}</p>

                            <img src="{{ asset('images/lake_logo.jpg') }}" style="width: 100%;"/>

                            <p>{{ $result[$class][lang_number()]->short_description }}</p>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="container-fluid">

                <div class="row justify-content-md-center">

                    {{--                    {{ $result->links('vendor.pagination.default') }}--}}

                </div>

            </div>
        @elseif($viewport == 'mobile')

            <div class="container-fluid" style="margin-top: 50%">

                <div class="row justify-content-sm-center">

                    @foreach($result as $result)
                        <div class="col-1"></div>

                        <div class="col-10" style="background-color: lightgrey; margin: 15px; padding: 5px; ">

                            <p>{{ $result->fish_data[lang_number()]->name }}</p>

                            <img src="{{ asset('images/logo.jpg') }}" style="width: 100%;"/>

                            <p>{{ $result->fish_data[lang_number()]->short_description }}</p>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="container-fluid">

                <div class="row justify-content-md-center">

                    {{ $result->links('vendor.pagination.default') }}

                </div>

            </div>


        @endif

    @endisset

@endsection
