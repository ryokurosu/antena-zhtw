<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

class DeleteReader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:reader {rss}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete reader description';

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
        $rss = $this->argument('rss');
        $pass = app_path('/Console/Commands/reader.txt');

        $txt = file_get_contents($pass);
        $txt = str_replace($rss,'',$txt);
        $txt = preg_replace("{\n\n}", "\n", $txt);
        try{
            file_put_contents($pass, $txt);
            echo "$rss を削除しました\n";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
