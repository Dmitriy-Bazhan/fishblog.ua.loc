@extends('layout.layout')

@section('content')
    <div id="first">
        <h3>First</h3>
        <button id="pushFirst">Push</button>
        <form>
            <input type="text" name="firstText1">
            <input type="text" name="firstText2">
        </form>
    </div>

    <div id="second">
        <h3>Second</h3>
        <button id="pushSecond">Push</button>
        <form>
            <input type="text" name="secondText1">
            <input type="text" name="secondText2">
        </form>
    </div>

    <script>
        $('#pushFirst').click( function () {
            $('#first').hide();
            $('#second').show();
        });


        $('#pushSecond').click( function () {
            $('#first').show();
            $('#second').hide();
        });
    </script>

@endsection
