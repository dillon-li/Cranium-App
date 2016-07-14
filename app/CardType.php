<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
  protected $table = 'cardtypes';
  public $timestamps = false;

  protected $guarded = [];

  public function cardcolor() {
    return $this->belongsTo('App\CardColor', 'color_id');
  }

  public function cards() {
    return $this->hasMany('App\Card');
  }
}
