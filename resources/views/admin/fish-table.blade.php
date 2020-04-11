@extends('layout.layout')

@section('header')
    @parent
    <ul>
        <li>
            <a href="admin">Users</a>
        </li>
        <li>
            <a>Fishes Table</a>
        </li>
        <li>
            <a href="lake-table">Lakes Table</a>
        </li>
    </ul>
@endsection

@section('content')

    @include('admin.sections.section-fish-table')

@endsection
