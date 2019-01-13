@extends('layouts.base')

@section('content')
  <manage-cleaners :house="{{ $house }}"></manage-cleaners>
@endsection
