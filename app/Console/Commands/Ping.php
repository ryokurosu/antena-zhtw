<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;

class Ping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ping send';

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

      $pings = [
        'https://www.google.com/ping?sitemap=',
        'https://www.bing.com/ping?sitemap='
      ];

      $url = url('/sitemap.xml');

      foreach($pings as $ping){
        $curl = curl_init($ping.urlencode($url));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET'); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($curl);
        curl_close($curl);
      }

      noticeDiscord("Ping send.".PHP_EOL."{$url}");

        //フィードのURL
      $url = url('/feed');
      if ($this->RequestHub($url)) {
        noticeDiscord("Feed {$url} リクエスト処理しました");
      } else {
        noticeDiscord("Feed {$url} リクエスト処理出来ませんでした");
      }

    }

    public function RequestHub($feed){
    //GooleのHubサーバー
      $url = 'http://pubsubhubbub.appspot.com/';
    //postデータ　hub.urlは"フィードのURL"
      $post = array(
        'hub.mode' => 'publish',
        'hub.url' => $feed,
      );
      $ch = curl_init();
    //curlを使用してPOST送信
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    //リクエスト実行
      $response = curl_exec($ch);
    //戻り値を取得
      $chinfo = curl_getinfo($ch);
        // echo "ステータスコード : ".$chinfo['http_code']."<br />";
    //戻り値のHTTPコードが"204"だったらtrue
      $res = (204 == $chinfo['http_code']);
      curl_close($ch);
      return $res;
    }
  }
