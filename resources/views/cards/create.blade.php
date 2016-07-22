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
}
#instructions {
  text-align:center;
  height:150px;
}
#hint {
  text-align:center;
  height:50px;
}
#question {
  text-align:center;
  height:150px;
  z-index:1;
}
#title {
  text-align:center;
  height:25%;
  background-color: red;
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
function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

  $(document).ready(function () {
    $('#question_input').keyup(function(){
      $('#question').html(nl2br($(this).val()));
    });
  });

  $(document).ready(function () {
    $('#hint_input').keyup(function(){
      $('#hint').html(nl2br($(this).val()));
    });
  });

  $(document).ready(function () {
  $('#showAnswer').click(function(){
    if ($(this).html() == "Show Answer") {
      $('#answer').text($('#answer_input').val());
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
                <div class="panel-heading">Make your {{$cardtype->title}} Card</div>
                <div class="panel-body">

                  <div class="w3-card-16">

                    <div id="image_left" class="w3-container">
                      <div class="img_div" style="background-image: url('/users/green.jpg');"> <p id="imgtitle">{{$color->title}} </p></div>
                    </div>

                    <div class="w3-container w3-white">
                      <p id="title"> {{$cardtype->title}} </p>
                      <p id="instructions">{{$cardtype->instruction}}</p>
                      <p id="hint">Hint Goes Here (if applicable)</p>
                      <div id="question" class="note">Question Goes Here (if applicable)</p>
                    </div>
                  </div>
                  <footer class="w3-container w3-black" id="answer_footer">
                    <p style="text-align:center" id="answer">(Answer hidden here)</p>
                  </footer>
                  <br>
                  <div style="text-align:center">
                    <button id="showAnswer" type="button">Show Answer</button>
                  </div>
                  <br><br>
                  <hr>

                        <form class="form-horizontal" name="createCardForm" id="createCardForm" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <textarea form="createCardForm" name="question" id="question_input"></textarea>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Hint</label>

                            <div class="col-md-6">
                                <input type="text" name="hint" id="hint_input" value="{{old('hint')}}">
                                @if ($errors->has('hint'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hint') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Answer</label>

                            <div class="col-md-6">
                                <input type="text" name="answer" id="answer_input" value="{{old('answer')}}">
                                @if ($errors->has('answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Create Card
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
