@extends('layouts.base')

@section('content')
    <host-cleaner-details :cleaner="{{ $cleaner }}"></host-cleaner-details>
@endsection
