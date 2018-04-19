<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Word;
use Exception;

class RemoveWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove word from command line';

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
        echo "現在のWordをリスト化します。\n";
      $words = Word::all();
      foreach($words as $word){
        echo $word->id.":".$word->text."\n";
    }
    echo "***************************************************";
    $id = $this->ask('削除したいWordのIDを入力してください。該当しないものを入力すると停止します。');
    try {
        $r = Word::findOrFail($id);
        $text = $r->text;
        $r->delete();
        echo $text."を削除しました。\n";
    } catch (Exception $e) {
        echo "停止します。";
    }
}
}
