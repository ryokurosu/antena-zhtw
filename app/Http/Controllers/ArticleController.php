<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Word;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $articles = Article::latest()->with('word')->paginate(52);
        if($id){
            $detail = Article::findOrFail($id);
            return view('article',[
                'articles' => $articles,
                'detail' => $detail,
            ]);

        }else{
            return view('article',[
                'articles' => $articles
            ]);
        }
    }

    public function page($id){

        $article = Article::with('twitters')->findOrFail($id);
        $article->increment('view',rand(1,3));
        $word = $article->word;

        $articles = Article::where('word_id',$word->id)->take(40)->get();
        return view('page',[
            'detail' => $article,
            'articles' => $articles
        ]);
    }

    public function word($id){
        $word = Word::findOrFail($id);
        $articles = Article::where('word_id',$word->id)->latest()->with('word')->paginate(52);
        return view('article',[
            'articles' => $articles,
            'word' => $word
        ]);
    }
}
