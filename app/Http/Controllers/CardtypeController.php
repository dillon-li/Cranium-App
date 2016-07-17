<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\CardSet;
use App\CardColor;
use App\CardType;

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
      if(!file_exists('users/'.$request->user()->username)){
        File::makeDirectory('users/'.$request->user()->username);
      }
      if (isset($request->color_img)){
        $img = true;
        $path = 'users/'.$request->user()->username;
        $filename = str_slug($request->color).'.'.$request->file('color_img')->getClientOriginalExtension();;
        $contents = $request->file('color_img');
        $contents->move(base_path().'/public/users/'.$request->user()->username.'/', $filename);
      }
      else {
        $img = false;
      }

      CardColor::create([
        'set_id' => $request->set_id,
        'color' => $request->color,
        'title' => $request->title,
        'hasImg' => $img,
      ]);

      return redirect()->action('CardsetController@viewCardset', $request->set_id);
    }

    public function editPage($cardcolor_id)
    {
      $cardcolor = CardColor::where('id', $cardcolor_id)->first();
      return view('cardcolors.edit')->with(['cardcolor' => $cardcolor]);
    }

    public function edit(Request $request)
    {
      $cardcolor = CardColor::where('id', $request->color_id)->first();

      if(!file_exists('users/'.$request->user()->username)){
        File::makeDirectory('users/'.$request->user()->username);
      }
      if (isset($request->color_img)){
        $img = true;
        $path = 'users/'.$request->user()->username;
        $filename = str_slug($request->color).'.'.$request->file('color_img')->getClientOriginalExtension();;
        $contents = $request->file('color_img');
        $contents->move(base_path().'/public/users/'.$request->user()->username.'/', $filename);
      }
      else {
        $img = false;
      }

      $cardcolor->color = $request->color;
      $cardcolor->title = $request->title;
      $cardcolor->hasImg = $img;
      $cardcolor->save();

      return redirect()->action('CardsetController@viewCardset', $cardcolor->set_id);
    }

    public function delete($color_id)
    {
      $cardcolor = CardColor::where('id', $color_id)->first();
      $cardcolor->delete();

      return back();
    }

}
