<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
use App\Word;
use App\Reader;
use App\Article;
use Exception;
use Goutte\Client;

class ArticleMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:maintenance';

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
      $words = Word::orderBy('text','asc')->get();
      $wordlist = [];
      foreach ($words as $index => $word) {
        $text = $word->text;
       $list = Word::where('text','like',"%{$text}%")->get();
       foreach($list as $value){
        if($word->id != $value->id){
          $wordlist[] = $value->id;
        }
       }
      }

      $wordlist = array_unique($wordlist);
      $delete_words = Word::whereIn('id',$wordlist)->get();
      $post = "";
      foreach($delete_words as $w){
        $post .=  $w->text . "is deleted." . PHP_EOL;
        $w->delete();
      }

      noticeDiscord($post);


      \App\Article::inRandomOrder()->chunk(5000,function($articles){
        foreach($articles as $article){

          $url = $article->url;

          $client = new Client();
          $crawler = $client->request('GET', $url);
          $imageUrl = '';
          $description = $article->description;

          try{
           $crawler->filter('meta')->each(function($node) use (&$imageUrl,&$description){
            if($node->attr('property') =='og:image'){
             $imageUrl =  $node->attr('content');
           }
           if($node->attr('property') =='og:description'){
             $description =  $node->attr('content');
           }
         });
           $title = $crawler->filter('title')->text();

           $imageUrl = strtok($imageUrl, '?');
           $image = Image::make(file_get_contents($imageUrl));
           $temp = explode('.',$imageUrl);
           $extension = $temp[count($temp) - 1];

           $image->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
          });

           $imageName = makeRandStr(8).'.'.$extension;
           $image->save(public_path('images/'.$imageName));

           $image->resize(120, null, function ($constraint) {
            $constraint->aspectRatio();
          });

           $image->save(public_path('thumbnail/'.$imageName));

         }catch(Exception $e){
          echo $e->getLine().":".$e->getMessage()."\n";
          $article->fill([
            'url' => $url,
            'title' => $title,
            'description' => $description,
          ])->save();

        }
        $article->fill([
          'url' => $url,
          'title' => $title,
          'description' => $description,
          'thumbnail' => $imageName,
        ])->save();
        echo "|";
      }
    });
    }
  }
