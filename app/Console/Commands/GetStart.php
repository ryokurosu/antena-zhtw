<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

class GetStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get start description';

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

        /* ファイルポインタをオープン */
        $file = fopen("https://geeek.jp/antena/app/Console/Commands/reader.txt", "r");
        var_dump($file);
        /* ファイルを1行ずつ出力 */
        if($file){
          while ($line = fgets($file)) {
            $line = str_replace(PHP_EOL, '', $line);
            $line = trim($line);
            try{
                \Artisan::call("add:reader" ,['url' => $line]);
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

    /* ファイルポインタをクローズ */
    fclose($file);

    noticeDiscord('get:start done');

    \Artisan::call('image:resize');
}
}
