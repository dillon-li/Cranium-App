<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\CardSet;
use App\CardColor;
use App\CardType;
use App\Card;

class CardtypeController extends Controller
{
    public function createPage($cardcolor_id)
    {
      $cardcolor = CardColor::where('id', $cardcolor_id)->first();
      $items = [
        'cardcolor' => $cardcolor
      ];
      return view('cardtypes.create')->with($items);
    }

    public function create(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|unique:cardtypes',
        'instruction' => 'required|unique:cardtypes'
      ]);

      $type = CardType::create([
        'color_id' => $request->color_id,
        'title' => $request->title,
        'instruction' => $request->instruction,
        'clubs' => $request->clubs
      ]);

      $color = CardColor::find($request->color_id);

      return redirect()->action('CardsetController@viewCardset', $color->set_id);
    }

    public function editPage($type_id)
    {
      $cardtype = CardType::where('id', $type_id)->first();
      $cardcolor = CardColor::where('id', $cardtype->color_id)->first();
      $items = [
        'cardtype' => $cardtype,
        'cardcolor' => $cardcolor
      ];
      return view('cardtypes.edit')->with($items);
    }

    public function edit(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'instruction' => 'required',
      ]);

      $cardtype = CardType::where('id', $request->type_id)->first();

      $cardtype->title = $request->title;
      $cardtype->instruction = $request->instruction;
      $cardtype->clubs = $request->clubs;
      $cardtype->save();

      $color = CardColor::where('id', $cardtype->color_id)->first();

      return redirect()->action('CardsetController@viewCardset', $color->set_id);
    }

    public function delete($type_id)
    {
      $cardtype = CardType::where('id', $type_id)->first();
      Card::where('type_id', $type_id)->delete();
      $cardtype->delete();

      return back();
    }

    public function viewCards($id)
    {
      $cardtype = CardType::find($id);
      $cards = Card::where('type_id', $id)->get();
      $items = [
        'cardtype' => $cardtype,
        'cards' => $cards
      ];

      return view('cardtypes.individual')->with($items);
    }

}
