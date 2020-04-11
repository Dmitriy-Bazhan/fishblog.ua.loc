@extends('layout.layout')

@section('header')
    @parent
    <ul>
        <li>
            <a href="admin">Users</a>
        </li>
        <li>
            <a href="fish-table">Fishes Table</a>
        </li>
        <li>
            <a>Lakes Table</a>
        </li>
    </ul>
@endsection

@section('content')

    @include('admin.sections.section-lake-table')

@endsection
