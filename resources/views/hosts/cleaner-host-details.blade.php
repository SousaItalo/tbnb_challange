@extends('layouts.base')

@section('content')
    <cleaner-host-details :host="{{ $host }}"></cleaner-host-details>
@endsection
