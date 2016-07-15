@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Card Color for {{$cardset->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cardcolor/create-color') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Card Color</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="color" value="{{ old('color') }}" placeholder="ex. Red, Blue, etc.">

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Color Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="ex. Word Worm, Creative Cat">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label">Add a picture for your color. Like this creative cat for blue:</label>
                          <div class="col-md-6">
                            <img src="{{ url('/images/creative_cat.jpg')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label">Upload Image (optional):</label>
                          <div class="col-md-6">
                            <input type="file" name="color_img">
                          </div>
                        </div>

                        <input type="hidden" name="set_id" value="{{$cardset->id}}" />

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil-square-o"></i> Create Card Color
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
