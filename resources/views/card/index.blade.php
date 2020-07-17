@extends('layouts.app')

@section('content')
<div class="m-3  border border-dark">
    <h3>Your selected card</h3>
    <h5>{{ Session::get('card')->suit }}{{ Session::get('card')->rank }}</h3>
</div>
<div class="row d-flex justify-content-center ">
    @if (Session::get('Wins') == false)
    <div class="col-3">
        <form method="POST" action="{{ route('cards.draft') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Draft</button>
        </form>
    </div>
    @endif

    <div class="col-3">
        <a class="btn btn-danger" href="{{ route('cards.create') }}">Reset</a>
    </div>

</div>
@if (Session::get('Wins') == true )
<div class="row d-flex justify-content-center">
    <div class="alert m-2 alert-success col-3" role="alert">
        Congratulation you've got it !
    </div>
    <div class="alert m-2 alert-success col-3" role="alert">
        Your chance of getting it was {{ $percentage }} %
    </div>
</div>
@endif
@isset($card)
<div class="row m-2 d-flex justify-content-center">
    <div class=" text-center col m-2 px-1 border border-dark">
        <h3>Drafted Card</h3>
        <h5>{{ $card->suit }}{{ $card->rank }}</h3>
    </div>
</div>
@endisset
@if (Session::get('Wins') == false) 
    <div class=" text-center border m-2 border-dark">
        <h3>Your chance of getting it</h3>
        <p>{{$percentage}} % </p>
    </div>
@endif

<!-- pop up for winning -->
@if (Session::get('Wins') == true )
<a type="button" data-toggle="modal" data-target="#myModal" id="wins"></a>
@endif
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="card">
            <div class="text-right cross"> <i class="fa fa-times"></i> </div>
            <div class="card-body text-center"> <img src="https://img.icons8.com/bubbles/200/000000/trophy.png">
                <h4>CONGRATULATIONS!</h4>
                <p>You've got it! <br> Your chance of getting it was {{ $percentage }} %</p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('#wins').click();
    });
</script>
@endpush