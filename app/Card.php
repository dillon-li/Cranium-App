<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
  protected $table = 'cards';
  public $timestamps = false;

  protected $guarded = [];

  public function cardtype() {
    return $this->belongsTo('App\CardType', 'type_id');
  }

}
