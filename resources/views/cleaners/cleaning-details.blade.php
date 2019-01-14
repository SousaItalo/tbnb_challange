@extends('layouts.base')

@section('content')
<cleaning-details :house="{{ $cleaning->house }}" :cleaning="{{ $cleaning }}"></cleaning-details>
@endsection
