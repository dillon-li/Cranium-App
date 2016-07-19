<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Card;
use App\Cardtype;
use App\CardColor;

class CardController extends Controller
{
    public function createPage($type_id)
    {
      $cardtype = Cardtype::where('id', $type_id)->first();
      $color = CardColor::where('id', $cardtype->color_id)->first();
      $items = [
        'cardtype' => $cardtype,
        'color' => $color
      ];

      return view('cards.create')->with($items);
    }
}
