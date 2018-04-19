<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Reader;
use Exception;

class RemoveReader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:reader';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove reader from command line';

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
        echo "現在のReaderをリスト化します。\n";
        $readers = Reader::all();
        foreach($readers as $reader){
            echo $reader->id.":".$reader->url.":".$reader->memo."\n";
        }
        echo "***************************************************";
        $id = $this->ask('削除したいReaderのIDを入力してください。該当しないものを入力すると停止します。');
        try {
            $r = Reader::findOrFail($id);
            $u = $r->url;
            $r->delete();
            echo "$u"."を削除しました。\n";
        } catch (Exception $e) {
            echo "停止します。";
        }
    }
}
