@extends('layouts.horizontal')

@section('content')
    @livewire('cart', ['cart' => auth()->user()->cart])
@endsection
