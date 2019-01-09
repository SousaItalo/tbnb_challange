@extends('layouts.base')

@section('content')
    <cleaner-host-list :hosts="{{ $hosts }}"></cleaner-host-list>
@endsection
