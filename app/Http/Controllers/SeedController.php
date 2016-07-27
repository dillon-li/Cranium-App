<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CardSet;
use App\CardColor;
use App\CardType;
use App\Card;
use Auth;

class SeedController extends Controller
{
    public function basic($id)
    {
      $cardset = CardSet::find($id);

      // Seed Colors
      if(!file_exists('users/'.Auth::user()->username)){
        File::makeDirectory('users/'.Auth::user()->username);
      }
      $dest = base_path().'/public/users/'.Auth::user()->username.'/';

      $colors = [
        'Red' => [
          'color' => 'Red',
          'title' => 'Datahead',
          'filename' =>'images/datahead.jpg',
        ],
        'Blue' => [
          'color' => 'Blue',
          'title' => 'Creative Cat',
          'filename' => 'images/creativecat.jpg',
        ],
        'Yellow' => [
          'color' => 'Yellow',
          'title' => 'Word Worm',
          'filename' => 'images/wordworm.jpg',
        ],
        'Green' => [
          'color' => 'Green',
          'title' => 'Star Performer',
          'filename' => 'images/starperformer.jpg',
        ],
      ];

      foreach ($colors as $color)
      {
        copy($color['filename'], $dest.$color['color'].'.jpg');

        $cardcolor[$color['color']] = CardColor::create([
          'set_id' => $cardset->id,
          'color' => $color['color'],
          'title' => $color['title'],
          'hasImg' => true
        ]);
      }

      // Seed Types
      $types = [
        '1' => [
          'color_id' => $cardcolor['Red']->id,
          'title' => 'FACTOID',
          'clubs' => false,
          'instruction' => "To win this Factoid, your team must correctly answer the <b>question</b> below. Only one final answer may be given. I'll read the question aloud and then start the timer."
        ],
        '2' => [
          'color_id' => $cardcolor['Red']->id,
          'title' => 'SELECTAQUEST',
          'clubs' => false,
          'instruction' => "To win this Selectaquest, your team must correctly answer the <b>multiple-choice</b> question below. I'll read the question and choices aloud and then start the timer."
        ],
        '3' => [
          'color_id' => $cardcolor['Red']->id,
          'title' => 'POLYGRAPH',
          'clubs' => false,
          'instruction' => "To win this Polygrpah, your team must determine whether the statement below is <b>true or false</b>. I'll read the statement aloud and then start the timer"
        ],
        '4' => [
          'color_id' => $cardcolor['Red']->id,
          'title' => 'ODD COUPLE',
          'clubs' => false,
          'instruction' => "To win this Odd Couple, your team must correctly pick the <b>two things</b> that <b>do not belong</b> on the list below. I'll read the category and list aloud, and then start the timer."
        ],
        '5' => [
          'color_id' => $cardcolor['Blue']->id,
          'title' => 'CLOODLE',
          'clubs' => true,
          'instruction' => "To win this Cloodle, choose an artist from your team who can get your team to correctly guess the answer to this card by <b>drawing</b> clues on paper with no talking, letters, or symbols. I'll read the hint aloud, show the card to the artist, and then start the timer."
        ],
        '6' => [
          'color_id' => $cardcolor['Blue']->id,
          'title' => 'SENSOSKETCH',
          'clubs' => true,
          'instruction' => "To win this Sensosketch, choose an artist to <b>draw</b> clues on paper with no talking, letters, or symbols. The artist's <b>eyes must stay closed</b>. I'll read the hint aloud, and then start the timer"
        ],
        '7' => [
          'color_id' => $cardcolor['Blue']->id,
          'title' => 'SCULPTORADES',
          'clubs' => false,
          'instruction' => "To win this Sculptorades, choose an artist from your team who can get your team to correctly guess the answer to this card by <b>sculpting</b> clues with the playdoh. I'll read the hint aloud, show the card to the artist, and then start the timer."
        ],
        '8' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'SPELLBOUND',
          'clubs' => false,
          'instruction' => "To win this Spellbound, choose a teammate who can correctly <b>spell</b> the word below on the first try without writing it down. I'll read the word to the speller and then start the timer."
        ],
        '9' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'TEAM GNILLEPS',
          'clubs' => false,
          'instruction' => "To win this Team Gnilleps, your team must work together to <b>spell the word</b> below <b>backward</b> on the first try without writing it down. All players on your team <b>take alternating turns</b>, adding one letter at a time to spell the word in reverse. I'll read the word aloud and then start the timer."
        ],
        '10' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'ZELPUZ',
          'clubs' => false,
          'instruction' => "To win this Zelpuz, your team must take the mixed-up puzzle below and <b>rearrange all the letters</b> to find the answer. I'll read the hint and puzzle aloud and then start the timer."
        ],
        '11' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'BLANKOUT',
          'clubs' => false,
          'instruction' => "To win this Blankout, your team must complete the puzzle below by <b>filling in the blanks</b> with the missing letters. I'll read the hint alound and then start the timer."
        ],
        '12' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'LEXICON',
          'clubs' => false,
          'instruction' => "To win this Lexicon, your team must determine the correct <b>definition</b> of the word below. I'll read the word and definitions aloud and then start the timer."
        ],
        '13' => [
          'color_id' => $cardcolor['Yellow']->id,
          'title' => 'MINDMELD',
          'clubs' => false,
          'instruction' => "To win this Mindmeld, each player on your team<b>secretly writes down three words</b> that come to mind when thinking of the topic below. Two players on your team must <b>match at least one answer</b>. I'll read the topic aloud, and then start the timer."
        ],
        '14' => [
          'color_id' => $cardcolor['Green']->id,
          'title' => 'CAMEO',
          'clubs' => true,
          'instruction' => "To win this Cameo, choose a performer from your team who can get your team to guess the answer to this card by <b>acting out silent clues</b>, just like charades. I'll read the hint aloud, show the card to the performer, and then start the timer."
        ],
        '15' => [
          'color_id' => $cardcolor['Green']->id,
          'title' => 'HUMDINGER',
          'clubs' => true,
          'instruction' => "To win this Humdinger, choose a performer from your team who can get your team to guess the answer to this card by <b>humming</b> or <b>whistling</b> the song with no lyrics or gestures. I'll show the card to the performer and then start the timer."
        ],
        '16' => [
          'color_id' => $cardcolor['Green']->id,
          'title' => 'COPYCAT',
          'clubs' => true,
          'instruction' => "To win this Copycat, choose a performer from your team who can get your team to guess the answer to this card by <b>acting</b> like the <b>famous person</b> or <b>character</b>. I'll read the hint aloud, show the card to the performer, and then start the timer."
        ],
        '17' => [
          'color_id' => $cardcolor['Green']->id,
          'title' => 'SIDESHOW',
          'clubs' => true,
          'instruction' => "To win this Sideshow, choose a performer from your team who can get your team to guess the answer to this card by <b>moving a teammate's arms and legs like a puppet</b>, with no talking or sound effects. The puppet can help guess the answer. I'll read the hint aloud, show the card to the puppeteer, and then start the timer."
        ],
      ];

      foreach ($types as $type)
      {
        $cardtype[$type['title']] = CardType::create([
          'color_id' => $type['color_id'],
          'title' => $type['title'],
          'instruction' => htmlspecialchars($type['instruction']),
          'clubs' => $type['clubs']
        ]);
      }

      // Factoids
      $file = fopen("seedfiles/factoids.txt","r");
      $string = fread($file, filesize("seedfiles/factoids.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode(',', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['FACTOID']->id,
          'set_id' => $id,
          'question' => nl2br($questions[$x]),
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Selectaquests
      $file = fopen("seedfiles/selectaquests.txt","r");
      $string = fread($file, filesize("seedfiles/selectaquests.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['SELECTAQUEST']->id,
          'set_id' => $id,
          'question' => nl2br($questions[$x]),
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Polygraphs
      $file = fopen("seedfiles/polygraphs.txt","r");
      $string = fread($file, filesize("seedfiles/polygraphs.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['POLYGRAPH']->id,
          'set_id' => $id,
          'question' => nl2br($questions[$x]),
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Odd Couples
      $file = fopen("seedfiles/oddcouples.txt","r");
      $string = fread($file, filesize("seedfiles/oddcouples.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $questions = explode('|', $split['1']);
      $answers = explode('|', $split['2']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['ODD COUPLE']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'question' => nl2br($questions[$x]),
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Cloodles
      $file = fopen("seedfiles/cloodles.txt","r");
      $string = fread($file, filesize("seedfiles/cloodles.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($answers); $x++) {
        Card::create([
          'type_id' => $cardtype['CLOODLE']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Sensosketch
      $file = fopen("seedfiles/sensosketches.txt","r");
      $string = fread($file, filesize("seedfiles/sensosketches.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($answers); $x++) {
        Card::create([
          'type_id' => $cardtype['SENSOSKETCH']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Sculptorades
      $file = fopen("seedfiles/sculptorades.txt","r");
      $string = fread($file, filesize("seedfiles/sculptorades.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($answers); $x++) {
        Card::create([
          'type_id' => $cardtype['SCULPTORADES']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Spellbound
      $file = fopen("seedfiles/spellbounds.txt","r");
      $string = fread($file, filesize("seedfiles/spellbounds.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['SPELLBOUND']->id,
          'set_id' => $id,
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Team Gnilleps
      $file = fopen("seedfiles/teamgnilleps.txt","r");
      $string = fread($file, filesize("seedfiles/teamgnilleps.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['TEAM GNILLEPS']->id,
          'set_id' => $id,
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Zelpuz
      $file = fopen("seedfiles/zelpuz.txt","r");
      $string = fread($file, filesize("seedfiles/zelpuz.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $questions = explode('|', $split['1']);
      $answers = explode('|', $split['2']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['ZELPUZ']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Blankout
      $file = fopen("seedfiles/blankouts.txt","r");
      $string = fread($file, filesize("seedfiles/blankouts.txt"));
      $split = explode('|||||', $string);
      $hints = explode('|', $split['0']);
      $questions = explode('|', $split['1']);
      $answers = explode('|', $split['2']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['BLANKOUT']->id,
          'set_id' => $id,
          'hint' => $hints[$x],
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Lexicon
      $file = fopen("seedfiles/lexicons.txt","r");
      $string = fread($file, filesize("seedfiles/lexicons.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['LEXICON']->id,
          'set_id' => $id,
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Mindmeld
      $file = fopen("seedfiles/mindmelds.txt","r");
      $string = fread($file, filesize("seedfiles/mindmelds.txt"));
      $questions = explode('|', $string);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['MINDMELD']->id,
          'set_id' => $id,
          'question' => $questions[$x],
        ]);
      }
      fclose($file);

      // Cameo
      $file = fopen("seedfiles/cameos.txt","r");
      $string = fread($file, filesize("seedfiles/cameos.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['CAMEO']->id,
          'set_id' => $id,
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Humdinger
      $file = fopen("seedfiles/humdingers.txt","r");
      $string = fread($file, filesize("seedfiles/humdingers.txt"));
      $answers = explode(PHP_EOL, $string);
      for ($x = 0; $x < count($answers); $x++) {
        Card::create([
          'type_id' => $cardtype['HUMDINGER']->id,
          'set_id' => $id,
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Copycat
      $file = fopen("seedfiles/copycats.txt","r");
      $string = fread($file, filesize("seedfiles/copycats.txt"));
      $answers = explode(PHP_EOL, $string);
      for ($x = 0; $x < count($answers); $x++) {
        Card::create([
          'type_id' => $cardtype['COPYCAT']->id,
          'set_id' => $id,
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);

      // Sideshow
      $file = fopen("seedfiles/sideshows.txt","r");
      $string = fread($file, filesize("seedfiles/sideshows.txt"));
      $split = explode('|||||', $string);
      $questions = explode('|', $split['0']);
      $answers = explode('|', $split['1']);
      for ($x = 0; $x < count($questions); $x++) {
        Card::create([
          'type_id' => $cardtype['SIDESHOW']->id,
          'set_id' => $id,
          'question' => $questions[$x],
          'answer' => $answers[$x]
        ]);
      }
      fclose($file);


      return redirect()->action('CardsetController@viewCardset', $cardset->id);
    }
}
