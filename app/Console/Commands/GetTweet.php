<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Intervention\Image\ImageManagerStatic as Image;
use App\Article;
use App\Twitter;
use Exception;

class GetTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:tweet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get:tweet description';

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
      $count = 0;
      foreach(Article::inRandomOrder()->cursor() as $index => $article){
            /*
            50以上あるならパス
             */
            if(Twitter::where('article_id',$article->id)->count() > 40){
              continue;
            }

            try{


              $domain = parse_url($article->url, PHP_URL_HOST);
              $url = 'https://search.yahoo.co.jp/realtime/search?ei=UTF-8&p=url:'.$domain.'+-RT';
              $client = new Client();
              $crawler = $client->request('GET', $url);

              $crawler->filter('.cnt.cf:not(.TS2bh)')->each(function($node) use ($article,&$count){
                try{

                  $tweet = $node->filter('h2')->text();
                  $tweet = trim($tweet);


                  $twitter_id = $node->filter('.inf .lt .nam')->text();

                  $link = $node->filter('span.time a')->attr('href');
                    // echo $link;
                  $original_url = $this->returnOriginalUrl($link);
                  $temp = explode('/',$original_url);
                  $tweet_id = $temp[count($temp) - 1];

                  if(!Twitter::where('article_id',$article->id)->where('tweet_id',$tweet_id)->first()){
                    Twitter::create([
                      'article_id' => $article->id,
                      'user_id' => $twitter_id,
                      'tweet_id' => $tweet_id,
                      'text' => $tweet
                    ]);
                    $count++;
                  }
                  echo "*";

                }catch(Exception $e){
                  echo $e->getLine()." ".$e->getMessage();
                }

              });

            }catch(Exception $e){
              echo $e->getMessage();
            }
            $time = microtime(true) - $time_start;
            if($time > 280){
              $time = number_format($time,2);
              noticeDiscord("add {$count} tweet line:{$index} {$time} s");
              break;
            }
          }
        }

        public function returnOriginalUrl($url){
          $header_data = get_headers($url, true);
          if(isset($header_data['Location'])){
            $original_url = $header_data['Location'];
            if(is_array($original_url)){
              $original_url = end($original_url);
            }
          }else{
            $original_url = $url;
          }
          return $original_url;
        }

      }
