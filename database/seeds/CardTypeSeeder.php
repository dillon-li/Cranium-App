<?php

use Illuminate\Database\Seeder;
use App\CardColor;
use App\CardType;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $types = [
        '1' => [
          'color_id' => 1,
          'title' => 'Factoid',
          'instruction' => "To win this Factoid, your team must correctly answer the question below. Only one final answer may be given. I'll read the question aloud and then start the timer."
        ],
        '2' => [
          'color_id' => 1,
          'title' => 'Selectaquest',
          'instruction' => "To win this Selectaquest, your team must correctly answer the multiple choice question below. I'll read the question and choices aloud and then start the timer."
        ],
        '3' => [
          'color_id' => 1,
          'title' => 'Polygraph',
          'instruction' => "To win this Polygrpah, your team must determine whether the statement below is true or false. I'll read the statement aloud and then start the timer"
        ],
        '4' => [
          'color_id' => 2,
          'title' => 'Cloodle',
          'instruction' => "To win this Cloodle, choose an artist from your team who can get your team to correctly guess the answer to this card by drawing clues on paper with no talking, letters, or symbols. I'll read the hint aloud, show the card to the artist, and then start the timer."
        ],
        '5' => [
          'color_id' => 2,
          'title' => 'Sensosketch',
          'instruction' => "To win this Sensosketch, choose an artist from your team who can get your team to correctly guess the answer to this card by drawing clues on paper with their eyes closed and no talking, letters, or symbols. I'll read the hint aloud, show the card to the artist, and then start the timer."
        ],
        '6' => [
          'color_id' => 2,
          'title' => 'Sculptorades',
          'instruction' => "To win this Sculptorades, choose an artist from your team who can get your team to correctly guess the answer to this card by sculpting clues with the playdoh. I'll read the hint aloud, show the card to the artist, and then start the timer."
        ],
        '7' => [
          'color_id' => 3,
          'title' => 'Spellbound',
          'instruction' => "To win this Spellbound, choose a teammate who can correctly spell the word below on the first try without writing it down. I'll read the word to the speller and then start the timer."
        ],
        '8' => [
          'color_id' => 3,
          'title' => 'Gnilleps',
          'instruction' => "To win this Gnilleps, choose a teammate who can correctly spell the word below backwards on the first try without writing it down. I'll read the word to the speller and then start the timer."
        ],
        '9' => [
          'color_id' => 3,
          'title' => 'Zelpuz',
          'instruction' => "To win this Zelpuz, your team must take the mixed-up puzzle below and rearrange all the letters to find the answer. I'll read the hint and puzzle aloud and then start the timer."
        ],
        '10' => [
          'color_id' => 3,
          'title' => 'Blankout',
          'instruction' => "To win this Blankout, your team must complete the puzzle below by filling in the blanks with the missing letters. I'll read the hint alound and then start the timer."
        ],
        '11' => [
          'color_id' => 3,
          'title' => 'Lexicon',
          'instruction' => "To win this Lexicon, your team must determine the correct definition of the word below. I'll read the word and definitions aloud and then start the timer."
        ],
        '12' => [
          'color_id' => 4,
          'title' => 'Cameo',
          'instruction' => "To win this Cameo, choose a performer from your team who can get your team to guess the answer to this card by acting out silent clues, just like charades. I'll read the hint aloud, show the card to the performer, and then start the timer."
        ],
        '13' => [
          'color_id' => 4,
          'title' => 'Humdinger',
          'instruction' => "To win this Humdinger, choose a performer from your team who can get your team to guess the answer to this card by humming the song with no lyrics or gestures. I'll show the card to the performer and then start the timer."
        ],
        '14' => [
          'color_id' => 4,
          'title' => 'Copycat',
          'instruction' => "To win this Copycat, choose a performer from your team who can get your team to guess the answer to this card by acting like the famous person or character. I'll read the hint aloud, show the card to the performer, and then start the timer."
        ],
        '15' => [
          'color_id' => 4,
          'title' => 'Sideshow',
          'instruction' => "To win this Sideshow, choose a performer from your team who can get your team to guess the answer to this card by moving a teammate's arms and legs like a puppet, with no talking or sound effects. The puppet can help guess the answer. I'll read the hint aloud, show the card to the puppeteer, and then start the timer."
        ],
      ];

      foreach ($types as $type)
      {
        CardType::create([
          'color_id' => $type['color_id'],
          'title' => $type['title'],
          'instruction' => $type['instruction']
        ]);
      }

    }
}
