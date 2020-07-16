@extends('layouts.app')

@section('content')

<h1 class="text-center ">Welcome to Poker Game</h1>

<a class="btn btn-large btn-danger" href="{{ route('cards.create') }}">Get Started!</a>
@endsection