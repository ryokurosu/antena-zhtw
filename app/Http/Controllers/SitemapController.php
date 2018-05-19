<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Word;

class SitemapController extends Controller
{
    public function article($id){
        return response()->view('article_sitemap',
            [
            	'id' => $id
            ]
        )->header('Content-Type', 'text/xml');
    }

     public function top(){
        return response()->view('top_sitemap',
            [
                'words' => Word::all()
            ]
        )->header('Content-Type', 'text/xml');
    }
     public function index(){
        return response()->view('sitemap')->header('Content-Type', 'text/xml');
    }
}

?>