@extends('layout.admin_layout')

@section('header')
    @parent
@endsection

@section('content')

    @include('admin.sections.section-lake-table')

@endsection
