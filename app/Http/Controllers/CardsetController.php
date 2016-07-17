<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;

use App\User;
use App\CardSet;
use App\CardColor;
use App\CardType;
use App\Card;

class CardsetController extends Controller
{
    public function index(Request $request)
    {
      $cardsets = CardSet::where('user_id', $request->user()->id)->get();
      $items = [
        'cardsets' => $cardsets
      ];
      return view('cardsets.displayCardsets')->with($items);
    }

    public function createPage()
    {
      return view('cardsets.create');
    }

    public function create(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:cardsets',
      ]);

      CardSet::create([
        'name' => $request->name,
        'user_id' => $request->user()->id
      ]);

      return redirect()->action('CardsetController@index');
    }

    public function viewCardset($id)
    {
      $cardset = CardSet::where('id', $id)->first();
      $user = User::where('id', $cardset->user_id)->first();
      $cardcolors = CardColor::where('set_id', $cardset->id)->get();
      $color_img = storage_path('DoABarrelRoll/testing-uploads.jpg');
      $items = [
        'cardset' => $cardset,
        'cardcolors' => $cardcolors,
        'color_img' => $color_img,
        'user' => $user
      ];
      if ($cardcolors->count() > 0) {
        foreach ($cardcolors as $color) {
          $cardtypes[$color->id] = CardType::where('color_id', $color->id)->get();
          $cardtype_count[$color->id] = $cardtypes[$color->id]->count() + 1;
        }
        $items['cardtypes'] = $cardtypes;
        $items['cardtype_count'] = $cardtype_count;
      }

      return view('cardsets.individual')->with($items);

    }

    public function editPage($id)
    {
      $cardset = CardSet::where('id', $id)->first();
      $cardcolors = CardColor::where('set_id', $cardset->id)->get();
      foreach ($cardcolors as $color) {
        $cardtypes['{$color->id}'] = CardType::where('color_id', $color->id)->get();
      }

      $items = [
        'cardset' => $cardset,
        'cardcolors' => $cardcolors,
        'cardtypes' => $cardtypes
      ];

      return view('cardsets.edit')->with($items);

    }
}
