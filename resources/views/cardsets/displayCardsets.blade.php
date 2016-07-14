@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Current Cardsets</div>

                @if ($cardsets->count() > 0)
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Card Set</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cardsets as $cardset)
                            <tr>
                              <td><a href="/cardset/{{$cardset->id}}">{{$cardset->name}}</a></td>
                              <td>
                                <a href="/cardset/delete/{{$cardset->id}}" onclick="return confirm('Click OK to confirm deletion')">Delete<a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                @else
                  <div class="panel-body">
                    You have no current cardsets. <br><Br>
                    Click <a href="/cardset/create"> HERE </a> to make one!
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
