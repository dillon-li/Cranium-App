<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CardSet;
use App\CardColor;

class CardcolorController extends Controller
{
    public function createPage($cardset_id)
    {
      $cardset = CardSet::where('id', $cardset_id)->first();
      $items = [
        'cardset' => $cardset
      ];
      return view('cardcolors.create')->with($items);
    }

    public function create(Request $request)
    {
      CardColor::create($request->all());
      return redirect()->action('CardsetController@viewCardset', $request->set_id);
    }
}
