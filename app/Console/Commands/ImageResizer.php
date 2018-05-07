<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;

class ImageResizer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:resize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'image:resize from images to thumbnail';

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
        foreach(\App\Article::orderBy('created_at','desc')->take(3000)->cursor() as $a){
            $thumbnail = $a->thumbnail;
            if(\File::exists(public_patH('images/'.$thumbnail))){
                echo "true";
            }else{
              $a->fill(['thumbnail' => 'noimage.jpg'])->save();
              echo "|";
            }
        }
    }
}
