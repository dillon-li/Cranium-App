<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardSet extends Model
{
    protected $table = 'cardsets';
    public $timestamps = false;

    protected $guarded = [];

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function cardcolors() {
      return $this->hasMany('App\CardColor');
    }
}
