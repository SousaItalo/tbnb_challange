@extends('layouts.base')

@section('content')
    <cleaner-cleaning-list :houses="{{ $houses }}"></cleaner-cleaning-list>
@endsection
