<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CardSet;
use App\CardColor;
use App\CardType;
use App\Card;

class GameController extends Controller
{
    public function start($id)
    {
      $cardset = CardSet::find($id);
      $colors = CardColor::where('set_id', $id)->get();
      $items = [
        'cardset' => $cardset,
        'colors' => $colors
      ];
      return view('cards.playCard')->with($items);
    }

    public function newCard(Request $request)
    {
      $color = CardColor::where('id', $request->color)->first();
      $cardtype = CardType::where('color_id', $color->id)->get()->random();
      $card = Card::where('type_id', $cardtype->id)->get()->random();

      $colors = CardColor::where('set_id', $request->cardset_id)->get();
      $cardset = CardSet::find($request->cardset_id);

      if (isset($request->card)) {
        // do some logic
      }

      $items = [
        'color' => $color,
        'cardtype' => $cardtype,
        'card' => $card,
        'colors' => $colors,
        'cardset' => $cardset
      ];

      return view('cards.playCard')->with($items);
    }
}
