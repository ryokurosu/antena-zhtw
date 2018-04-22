<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Word;
use Exception;
use Goutte\Client;

class SuggestWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:suggest {word?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add suggest from suggest word';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $time_start = microtime(true);
      $wordlist = PHP_EOL;
      if($this->argument('word')){
        $words = Word::where('text',$this->argument('word'))->get();
      }else{
        $words = Word::inRandomOrder()->get();
      }
      if(count($words) > 500){
        return false;
      }
      foreach ($words as $word) {
        try {
          $client = new Client();
          $sitemap = $client->request('GET',"https://www.google.com/complete/search?hl=en&q=hello&output=toolbar&q=" . urlencode($word->text));
          $sitemap->filter('suggestion')->each(function($node) use (&$wordlist){
            $attr = $node->attr('data');
            foreach(explode(' ',$attr) as $w){
              try{
                if(!Word::where('text',$w)->first()){
                  \Artisan::call('add:word',['text' => $w]);
                  $wordlist .= $w . PHP_EOL;
                }
              }catch(Exception $e){
                continue;
              }
            }
          });
        } catch (Exception $e) {
          postToDiscord($e);
          continue;
        }
      }
      $time = microtime(true) - $time_start;
      noticeDiscord("Add Suggest word {$wordlist} {$time} s");

    }
  }
