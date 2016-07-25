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
                            <td>Seed</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cardsets as $cardset)
                            <tr>
                              <td><a href="/cardset/{{$cardset->id}}">{{$cardset->name}}</a></td>
                              <td>
                                <a href="/cardset/delete/{{$cardset->id}}" onclick="return confirm('Are you sure you want to delete this entire cardset?')">Delete<a>
                              </td>
                              <td>
                                <a href="/seeding/{{$cardset->id}}/basic">
                                  <button type="button">Basic Seeder
                                </a>
                              </td>
                            </tr>
                          @endforeach
                          <p> What does the cardset seeding button do?<br>
                            Since I doubt people want to create ALL their own cards, there is the option of a quick button to create all of the
                            basic categories as well as some default cards to start off your set. This is a good starting option. Not to worry though,
                            one can look at all the cards in their collection and edit/remove any they don't want, and of course, add any new ones they want.
                            This button is just for a good quick start, and does not affect the customizability of the app at all.
                          </p>
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
