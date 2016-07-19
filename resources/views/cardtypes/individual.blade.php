@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All of your {{$cardtype->title}}s</div>
                @if ($cards->count() > 0)
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Card Question (if applicable)</td>
                            <td>Card Answer</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($cards as $card)
                            <tr>
                              <td>{{$card->question}}</td>
                              <td>{{$card->answer}}</td>
                              <td>
                                <a href="/card/edit/{{$card->id}}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-btn fa-pencil-square-o"></i> Edit
                                    </button>
                                </a>
                                <a href="/card/delete/{{$card->id}}" onclick="return confirm('Click OK to confirm deletion')">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-btn fa-trash"></i> Delete
                                    </button>
                                </a>
                              </td>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                @else
                  <div class="panel-body">
                    The are no cards of this type yet. <br><br>
                      <a href="/card/create/{{$cardtype->id}}">
                          <button type="button" class="btn btn-primary">
                              <i class="fa fa-btn fa-pencil-square-o"></i> Create Card
                          </button>
                      </a>
                  </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
