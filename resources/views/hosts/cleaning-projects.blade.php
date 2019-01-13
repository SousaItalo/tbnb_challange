@extends('layouts.base')

@section('content')
  <cleaning-projects :cleanings="{{ $cleanings }}"></cleaning-projects>
@endsection
