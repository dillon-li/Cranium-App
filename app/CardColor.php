<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardColor extends Model
{
  protected $table = 'cardcolors';
  public $timestamps = false;

  protected $guarded = [];

  public function cardset() {
    return $this->belongsTo('App\CardSet', 'set_id');
  }

  public function cardtypes() {
    return $this->hasMany('App\CardType');
  }
}
