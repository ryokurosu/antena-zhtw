@extends('layouts.app')
@include('layouts.defaultpart')

@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@stop

@isset($detail)
@section('title',$detail->title)
@section('description',$detail->description)
@section('image',$detail->imagePath())
@section('breadcrumbs')
{{ Breadcrumbs::render('list',$detail) }}
@overwrite
@endisset

@isset($word)
@section('title',$word->text.'に関する記事一覧')
@section('description',$word->text.'に関する記事一覧')
@section('breadcrumbs')
{{ Breadcrumbs::render('word',$word) }}
@overwrite
@endisset

@section('content')
<div class="panel panel-default">
  @if(isset($detail) || isset($word))
  <div class="panel-heading"><h1 class="small">@yield('title')</h1></div>
  @endif
  <ul class="list-group">
    @foreach($articles as $article)
    <li class="list-group-item" itemscope itemtype="http://schema.org/Article">
      <div class="padding-wrap">
        <div class="col-xs-3 thumbnail">
          <a class="thumbnail-link" href="{{$article->path()}}">
            <img src="{{$article->thumbnailPath()}}" alt="{{$article->title}}">
          </a>
        </div>
        <div class="col-xs-9 title">
          <a class="title-link" href="{{$article->path()}}" itemprop="name">
           {{$article->title}}
         </a>
         <a class="description-link">
          @php
          echo mb_strimwidth($article->description, 0, 120, '', 'utf8');
          @endphp
        </a>
      </div>
      <div class="clear"></div>
      <div class="col-xs-12 cat">
        <span class="cat-item">
          {{$article->word->text}}
        </span>
        <span class="cat-domain" itemprop="author">
          @php
          echo parse_url($article->url, PHP_URL_HOST);
          @endphp
        </span>
        <a href="{{$article->path()}}" class="link-btn">サイトへ</a>
      </div>
      <span class="view">{{$article->view}} view</span>
    </div>
  </li>
  @endforeach
</ul>
</div>
{{$articles->links()}}
@endsection
