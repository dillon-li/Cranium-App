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

    public function create(Request $request)
    {
      Card::create([
        'type_id' => $request->type_id,
        'question' => nl2br($request->question),
        'hint' => $request->hint,
        'answer' => $request->answer
      ]);

      return redirect()->action('CardtypeController@viewCards', $request->type_id);
    }

    public function editPage($id)
    {
      $card = Card::find($id);
      $cardtype = CardType::where('id', $card->type_id)->first();
      $cardcolor = CardColor::where('id', $cardtype->color_id)->first();
      $items = [
        'card' => $card,
        'cardtype' => $cardtype,
        'color' => $cardcolor
      ];

      return view('cards.edit')->with($items);
    }

    public function edit(Request $request)
    {
      $card = Card::find($request->card_id);
      $card->question = nl2br($request->question);
      $card->hint = $request->hint;
      $card->answer = $request->answer;
      $card->save();

      return redirect()->action('CardtypeController@viewCards', $card->type_id);
    }

    public function delete($id)
    {
      Card::where('id', $id)->delete();
      return back();
    }
}
