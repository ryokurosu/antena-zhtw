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
        foreach(\App\Article::orderBy('created_at','desc')->get() as $a){
            try{

                $image = Image::make(public_path('images/'.$a->thumbnail));
                $image->resize(28, null, function ($constraint) {
                  $constraint->aspectRatio();
              });
                $image->save(public_path('thumbnail/'.$a->thumbnail));
                echo "|";
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
}
