<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Word;
use Exception;

class AddWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:word {text} {recursive?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add word from command line';

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
     $text = $this->argument('text');
     try {
        if(!ctype_alnum($text) && $this->wordChecker($text)){
            $w = Word::create([
                'text' => $text,
            ]);
            echo "{$text} done";
            if($this->argument('recursive')){
                \Artisan::call('add:suggest',['word' => $text]);
            }
        }else{
            echo "\"{$text}\" is duplicated.".PHP_EOL;
        }
    } catch (Exception $e) {
        echo $e->getMessage()."\n";
    }
}

public function wordChecker($text){
    $words = Word::all();
    $check = true;
    foreach($words as $word){
        if(strpos($word->text,$text) !== false){
            //'abcd'のなかに'bc'が含まれている場合
            $check =  false;
            break;
        }
    }
    return $check;
}
}
