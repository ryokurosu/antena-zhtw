@extends('layouts.app')
@include('layouts.defaultpart')

@section('title',$detail->title)
@section('description',$detail->description)
@section('image',$detail->imagePath())




@section('content')
<div class="panel panel-default">
  <div class="panel-heading"><h1>{{$detail->title}}</h1></div>
  <div class="panel-body">
    <div class="thumbnail-wrap">
      <img src="{{$detail->imagePath()}}" alt="{{$detail->title}}">
    </div>
    <div class="block">
      <p><center>
              <a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">[PR]【最新版】病院にいる9割の医者が知らないアトピー完治のコツを公開！？</a>
            </center></p>
            <p><center>
              <a href="https://uranai-cafe.jp/animal/" rel="nofollow" target="_blank">[PR]動物キャラ占い(無料)で、あなたの性格・恋愛傾向・毎日の運勢・今後の人生の運気がわかります。</a>
            </center></p>
    </div>
    <div class="meta-wrap">
      <p>{{$detail->description}}</p>
    </div>
    <div class="link-wrap">
      @yield('link-ad')
    </div>
    <div class="block">
      <a class="ad" href="http://bit.ly/2GrwvAS" target="_blank"><img src="https://bitflyer.jp/Images/Affiliate/affi_04_300x250.gif?201709" alt="bitFlyer ビットコインを始めるなら安心・安全な取引所で"></a>

      <a class="ad" href="http://bit.ly/2HCjuVE" target="_blank" rel="nofollow">
        <img border="0" width="300" height="250" alt="" src="https://www27.a8.net/svt/bgt?aid=180211552510&wid=004&eno=01&mid=s00000015135002012000&mc=1"></a>

      </div>
      <div id="tweet-list">
        <ul class="list-group noback">
          <li class="list-group-item">
            <p><a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">{{'@kei'}}</a></p>
            <p>このサイト参考にしたら、アトピーが治りました。今まで夜は痒くて痒くて仕方なかったりしたのに助かった。。。<a style="text-decoration: underline;" href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">http://bit.ly/2qB2KIe</p>
          </li>
          <li class="list-group-item">
            <p><a href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">{{'@mama_nerse'}}</a></p>
            <p><a style="text-decoration: underline;" href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">看護師・介護士のセクハラ被害の実態</p>
          </li>
          @foreach($detail->twitters as $tweet)
          <li class="list-group-item">
            <p><a href="{{$tweet->userLink()}}" rel="nofollow" target="_blank">{{'@'}}{{$tweet->user_id}}</a></p>
            <p>{{$tweet->text}}</p>
            <span class="time"><a href="{{$tweet->tweetLink()}}" rel="nofollow" target="_blank">{{$tweet->updated_at->format('Y/n/j H:i:s')}}</a></span>
          </li>
          @endforeach
        </ul>
      </div>

          <div class="sns-area">
            <ul class="social-button-syncer">
              <li class="sc-tw">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="true" data-hashtags="{{config('app.name')}}">Tweet</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </li>

              <!-- Facebook -->
              <li class="sc-fb">
                <div class="fb-like" data-href="{{url()->current()}}" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
              </li>

              <!-- Google+ -->
              <li><div data-href="{{url()->current()}}" class="g-plusone" data-size="tall"></div></li>

              <!-- はてなブックマーク -->
              <li><a href="http://b.hatena.ne.jp/entry/{{url()->current()}}" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border:none;" /></a></li>

              <!-- pocket -->
              <li><a data-save-url="{{url()->current()}}" data-pocket-label="pocket" data-pocket-count="vertical" class="pocket-btn" data-lang="en"></a></li>

              <li class="sc-li">
                <div class="line-it-button" data-lang="ja" data-type="share-a" data-url="{{url()->current()}}" style="display: none;"></div>
                <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
              </li>
            </ul>
            <div id="fb-root"></div>
          </div>
          <div class="meta-wrap block">
            <p><center>
              <a href="https://px.a8.net/svt/ejp?a8mat=2ZEUCM+APSZV6+407E+614CZ" target="_blank">エンジニア、プログラマー必見！翔泳社の通販『SEshop』はIT・開発関連書籍が豊富！全国どこでも送料無料でお得です！</a>
            </center></p>
            <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
          </div>
            <div class="block">
        <a class="ad" href="https://px.a8.net/svt/ejp?a8mat=2ZEUCM+6NCD1U+358E+61JSH" target="_blank" rel="nofollow">
          <img border="0" width="300" height="250" alt="" src="https://www21.a8.net/svt/bgt?aid=180411430402&wid=005&eno=01&mid=s00000014675001015000&mc=1"></a>

          <a class="ad" href="https://px.a8.net/svt/ejp?a8mat=2ZEUCM+6YNLJM+1ORI+U13R5" target="_blank" rel="nofollow">
            <img border="0" width="336" height="280" alt="" src="https://www28.a8.net/svt/bgt?aid=180411430421&wid=005&eno=01&mid=s00000007875005044000&mc=1"></a>
          </div>
          <ul class="list-group noback">
            @foreach($articles as $article)
            <li class="list-group-item">
              <div class="padding-wrap">
                <div class="col-xs-3 thumbnail">
                  <a class="thumbnail-link" href="{{$article->path()}}">
                    <img src="{{$article->imagePath()}}" alt="{{$article->title}}">
                  </a>
                </div>
                <div class="col-xs-9 title">
                  <a class="title-link" href="{{$article->path()}}">
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
                <span class="cat-domain">
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
    </div>
    @endsection
