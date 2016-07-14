<?php

use Illuminate\Database\Seeder;
use App\CardColor;

class CardColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $colors = [
        'Red' => [
          'color' => 'Red',
          'title' => 'Datahead'
        ],
        'Blue' => [
          'color' => 'Blue',
          'title' => 'Creative Cat'
        ],
        'Yellow' => [
          'color' => 'Yellow',
          'title' => 'Word Worm'
        ],
        'Green' => [
          'color' => 'Green',
          'title' => 'Star Performer'
        ],
      ];

      foreach ($colors as $color)
      {
        CardColor::create([
          'set_id' => 1,
          'color' => $color['color'],
          'title' => $color['title']
        ]);
      }

    }
}
