@extends('layouts.base')

@section('content')
    <new-cleaner-connection csrf="{{ csrf_token() }}"></new-cleaner-connection>
@endsection
