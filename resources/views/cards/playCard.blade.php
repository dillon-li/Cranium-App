@extends('layouts.app')

@section('content')

<style>
#image_left {
  float:left;
  width:50%;
}
.img_div {
  color:white;
  font-weight:bold;
  text-align:center;
  height:400px;
  background-size: 300px 400px;
}
#instructions {
  text-align:center;
  height:90px;
}
#hint {
  text-align:center;
  height:25px;
  font-weight:bolder;
}
#question {
  text-align:center;
  height:225px;
  z-index:1;
}
#title {
  text-align:center;
  height:25%;
  color: white;
  font-size:20px;
  border-radius:25px;
  overflow:hidden;
}
#imgtitle {
  height:10%;
  background-color: black;
  color: white;
  font-size:20px;
  border-radius:35px;
  overflow:hidden;
}
</style>

<script>
$(document).ready(function () {
$('#showAnswer').click(function(){
  if ($(this).html() == "Show Answer") {
      $('#answer').text($('#answer_text').text());
    $(this).html("Hide Answer");
  }
  else {
    $('#answer').text("(Answer hidden here)");
    $(this).html("Show Answer");
  }
});
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Picking a Card</div>
                <div class="panel-body">

                  @if (isset($card))
                  <div class="w3-card-16">
                    <div id="image_left" class="w3-container">
                      <div class="img_div" style="background-image: url({{'/users/'.Auth::user()->username.'/'.str_slug($color->color).'.jpg' }})"> <p id="imgtitle">{{$color->title}} </p></div>
                    </div>

                    <div class="w3-container w3-white">
                      @if ($color->color == 'Yellow')
                        <p id="title" style="background-color: {{$color->color}}; color:black"> {{$cardtype->title}} </p>
                      @else
                        <p id="title" style="background-color: {{$color->color}}"> {{$cardtype->title}} </p>
                      @endif
                      <p id="instructions"><?php echo htmlspecialchars_decode($cardtype->instruction) ?></p>
                      <p id="hint">{{$card->hint}}</p>
                      <div id="question" class="note"><?php echo nl2br($card->question) ?></p>
                    </div>
                  </div>
                  <footer class="w3-container w3-black" id="answer_footer">
                    <p style="text-align:center" id="answer">(Answer hidden here)</p>
                    <div style="display:none" id="answer_text">{{$card->answer}}</div>
                  </footer>
                  <br>
                  <div style="text-align:center">
                    <button id="showAnswer" type="button">Show Answer</button>
                  </div>
                </div>
                  <br><br>
                  @if (isset($club) and ($club == true))
                    <div style="float:left">
                        <img src="/images/club.jpg">
                    </div>
                    <div>
                      This is a club cranium, meaning <b>Everyone</b> plays! Winners get an immediate <b>bonus roll</b>. And the team
                      whose turn this was gets another card after the winner's bonus roll
                    </div>
                    <br><br><br>
                  @endif
                  <hr>
                  @endif

                        <form class="form-horizontal" name="newCard" role="form" method="POST" action="{{ url('/play') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Color</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="color">
                                      @foreach ($colors as $color)
                                        <option name="color" value="{{$color['id']}}">{{$color->color}}</option>
                                      @endforeach
                                    </select>
                                </div>

                            </div>

                            <input type="hidden" name="cardset_id" value="{{$cardset->id}}" />
                            @if (isset($card))
                              <input type="hidden" name="card_id" value="{{$card->id}}">
                            @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-btn fa-hand-grab-o"></i> Play New Card
                                    </button>
                                </div>
                            </div>
                          </form>

                          <form class="form-horizontal" name="skipCard" role="form" method="POST" action="{{ url('/play/skip') }}">
                              {{ csrf_field() }}
                            @if (isset($card))
                              <input type="hidden" name="cardcolor" value="{{$color->color}}" />
                              <input type="hidden" name="cardset_id" value="{{$cardset->id}}" />
                              <input type="hidden" name="card_id" value="{{$card->id}}">
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button class="btn btn-primary">
                                          <i class="fa fa-btn fa-exchange"></i> Skip
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
