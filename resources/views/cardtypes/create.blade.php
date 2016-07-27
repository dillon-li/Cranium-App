@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Card Type for Color: {{$cardcolor->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="createCardType" id="createCardType" method="POST" action="{{ url('/cardtype/create-type') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        The card type indicates what kind of card this will be. Examples from the original game are Factoids, where
                        a question must be answered or a Cameo, which is basically charades. The pictures below help to demonstrate
                        what a card type title and instruction look like on the card.
                        <br><br>
                        <hr>

                        <div class="form-group">
                          <label class="col-md-4 control-label">The card type:</label>
                          <div class="col-md-6">
                            <img src="{{ url('/images/cardtype_ex.jpg')}}">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group">
                          <label class="col-md-4 control-label">The card instruction:</label>
                          <div class="col-md-6">
                            <img src="{{ url('/images/cardinstruction_ex.jpg')}}">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Color Type Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="ex. Factoid, Lexicon, etc.">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Instruction</label>

                            <div class="col-md-6">
                                <textarea name="instruction" form="createCardType"
                                placeholder="ex. 'To win this factoid...'"></textarea>

                                @if ($errors->has('instruction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instruction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                            <div class="col-md-7">
                              <input type="checkbox" name="clubs" value= 1 />Allow Club Craniums
                              <span class="glyphicon glyphicon-question-sign" id="clubs" data-placement="right" title="Club Craniums will appear periodically and allow all teams to participate. The winning team will get an immediate bonus roll and then the team whose turn it was gets another card and turn."</span>
                            </div>
                          </div>

                        <input type="hidden" name="color_id" value="{{$cardcolor->id}}" />

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil-square-o"></i> Create Card Type
                                </button>
                            </div>
                        </div>

                        <script>
                          $("#clubs").tooltip();
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
