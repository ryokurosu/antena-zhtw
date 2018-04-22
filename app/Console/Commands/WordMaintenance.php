<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
use App\Word;
use App\Reader;
use App\Article;
use Exception;
use Goutte\Client;

class WordMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      $delete_id = "";
      foreach(\App\Article::cursor() as $article){
        $word_id = $article->word_id;
        if(!Word::where('id',$word_id)->first()){
          $delete_id .= $article->id. " ";
          $article->delete();
        }
      }
      noticeDiscord($delete_id . "maintenance");
    }
  }
