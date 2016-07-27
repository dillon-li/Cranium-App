@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Card Type: {{$cardtype->title}} under Color: {{$cardcolor->color}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="createCardType" id="createCardType" method="POST" action="{{ url('/cardtype/edit') }}" enctype="multipart/form-data">
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

                        <!-- Edit this later to show what the actual card looks like (bootstrap) -->

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Color Type Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $cardtype->title }}" placeholder="ex. Factoid, Lexicon, etc.">

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
                                placeholder="ex. 'To win this factoid...'">{{$cardtype->instruction}}</textarea>

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
                              @if (isset($cardtype->clubs) and ($cardtype->clubs == true))
                                <input type="checkbox" name="clubs" value= 1 checked="checked"/>Allow Club Craniums
                              @else
                                <input type="checkbox" name="clubs" value= 1 />Allow Club Craniums
                              @endif
                            </div>
                          </div>

                        <input type="hidden" name="type_id" value="{{$cardtype->id}}" />

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil-square-o"></i> Edit Card Type
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
