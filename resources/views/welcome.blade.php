@extends('layouts.app')

@section('content')

<h1 class="text-center ">Welcome to Poker Game</h1>
<p class="text-center">The game is simple, pick a card and start drafting cards until you find the selected one</p>
<a class="btn btn-large btn-danger" href="{{ route('cards.create') }}">Get Started!</a>
@endsection