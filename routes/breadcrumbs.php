<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('ホーム', route('article'));
});

// Home > Word
Breadcrumbs::register('word', function ($breadcrumbs,$word) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($word->text.'に関する記事一覧', route('article.word',$word->id));
});

// Home > [article] 
Breadcrumbs::register('page', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('記事一覧', route('article.list',$article->id));
    $breadcrumbs->push($article->title, route('article.page', $article->id));
});

// Home > [article] > list
Breadcrumbs::register('list', function ($breadcrumbs,$article) {
    $breadcrumbs->parent('page',$article);
    $breadcrumbs->push('関連記事一覧', route('article.list',$article->id));
});

