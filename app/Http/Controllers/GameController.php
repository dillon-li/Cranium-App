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
      Card::where('set_id', $cardset->id)
            ->where('played', true)
            ->update(['played' => false]);
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
      $card = Card::where('type_id', $cardtype->id)->where('played', false)->get()->random();

      $colors = CardColor::where('set_id', $request->cardset_id)->get();
      $cardset = CardSet::find($request->cardset_id);

      if (isset($request->card_id)) {
        $card_played = Card::find($request->card_id);
        $card_played->played = true;
        $card_played->plays = $card_played->plays + 1;
        $card_played->save();
      }

      $club = false;
      if ($cardtype->clubs) {
        $rand = rand(1,1000);
        if ($rand <= 300) {
          $club = true;
        }
      }

      $items = [
        'color' => $color,
        'cardtype' => $cardtype,
        'card' => $card,
        'colors' => $colors,
        'cardset' => $cardset,
        'club' => $club
      ];

      return view('cards.playCard')->with($items);
    }

    public function skip(Request $request)
    {
      $card = Card::find($request->card_id);
      $card->played = true;
      $card->skips = $card->skips + 1;
      $card->save();

    }
}
