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
  height:275px;
}
#question {
  text-align:center;
  height:75px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Make your {{$cardtype->title}} Card</div>
                <div class="panel-body">

                  <div class="w3-card-16">
                    <header class="w3-container w3-black">
                      <h1 style="text-align:center">{{$color->title}}</h1>
                    </header>

                    <div id="image_left" class="w3-container">
                      <div class="img_div" style="background-image: url('/users/green.jpg');"> {{$cardtype->title}} </div>
                    </div>

                    <div class="w3-container w3-white">
                      <p id="instructions">Instructions Go Here</p>
                      <p id="question">Question Goes Here (if applicable)
                      <footer class="w3-container w3-black">
                        <p style="text-align:center">(Answer hidden here)</p>
                      </footer>
                    </div>
                  </div>
                  <br><br>
                  <hr>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
