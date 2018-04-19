<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Reader;
use Exception;

class AddReader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:reader {url} {memo?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add reader from command line';

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
        $url = $this->argument('url');
        try {
            if($this->argument('memo')){
                Reader::create([
                    'url' => $url,
                    'memo' => $this->argument('memo'),
                ]);
            }else{
                Reader::create([
                    'url' => $url,
                    'memo' => 'from command line'
                ]);
            }
            echo "done\n";
        } catch (Exception $e) {
            echo $e->getMessage()."\n";
        }
    }
}
