@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">The Cranium App</div>

                <div class="panel-body">
                  <div>
                    Cranium is a classic board game that forces teams to answer questions or
                    or act out scenes and characters in order to progress on the board.
                  </div>
                  <div>
                    <img src="{{ url('/images/gamepic.jpg')}}">
                    <img src="{{ url('/images/cardexamples.jpg')}}">
                    <br><br>
                  <div>
                    This app is designed to allow a user to create his/her own cards to use in a cardset
                    during a game. Instead of drawing cards from the deck, a user will simply pull up a
                    random card from their selected cardset.
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
