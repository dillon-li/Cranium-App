@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Card Type for Color: {{$cardcolor->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="createCardType" id="createCardType" method="POST" action="{{ url('/cardcolor/create-colortype') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">

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

                        <input type="hidden" name="set_id" value="{{$cardcolor->id}}" />

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil-square-o"></i> Create Card Type
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
