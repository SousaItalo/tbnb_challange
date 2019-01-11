@extends('layouts.base')

@section('content')
  <new-house csrf="{{ csrf_token() }}"></new-house>
@endsection
