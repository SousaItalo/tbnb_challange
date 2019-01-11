@extends('layouts.base')

@section('content')
  <edit-house
    csrf="{{ csrf_token() }}"
    id="{{ $house->id }}"
    name="{{ $house->name }}"
    address="{{ $house->address }}"
  />
@endsection
