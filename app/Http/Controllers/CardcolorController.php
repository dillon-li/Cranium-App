<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;

use App\User;
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
      if(!file_exists(storage_path($request->user()->username))){
        Storage::makeDirectory($request->user()->username);
      }
      if (isset($request->color_img)){
        $img = true;
        $path = $request->user()->username.'/'.str_slug($request->color).'.jpg';
        Storage::put(
          $path, file_get_contents($request->file('color_img')->getRealPath())
        );
      }
      else {
        $img = false;
      }

      CardColor::create([
        'set_id' => $request->set_id,
        'color' => $request->color,
        'title' => $request->title,
        'hasImg' => $img
      ]);

      return redirect()->action('CardsetController@viewCardset', $request->set_id);
    }
}
