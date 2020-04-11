@extends('layout.layout')

@section('header')
    @parent

    <ul>
        <li>
            <a>Users</a>
        </li>
        <li>
            <a href="fish-table">Fishes Table</a>
        </li>
        <li>
            <a href="lake-table">Lakes Table</a>
        </li>
    </ul>
@endsection

@section('content')

    @include('admin.sections.section-user-table')

@endsection
