@extends('layouts.app')

@section('content')
<h3>Select your card</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('cards.store') }}" class="p-4">
    @csrf
    <div class="form-group">
        <select class="form-control" name="suit">
            <option disabled selected>Select Suit</option>
            @foreach ($suits as $suit)
            <option value="{{$suit[0]}}">{{$suit}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="rank">
            <option disabled selected>Select Rank</option>
            @foreach ($ranks as $rank)
            <option value="{{ is_string($rank) ? $rank[0] : $rank }}">{{$rank}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-info">Start Game</button>
    

</form>
@endsection