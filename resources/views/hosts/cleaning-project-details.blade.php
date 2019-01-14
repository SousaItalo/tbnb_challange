@extends('layouts.base')

@section('content')
  <cleaning-project-details
    id="{{ $cleaningProject->id }}"
    house-name="{{ $house->name }}"
    house-address="{{ $house->address }}"
    cleaner-name="{{ $cleaningProject->cleaner->name }}"
    start="{{ date('Y/m/d h:i a', strtotime($cleaningProject->start)) }}"
    end="{{ date('Y/m/d h:i a', strtotime($cleaningProject->end)) }}"/>
@endsection
