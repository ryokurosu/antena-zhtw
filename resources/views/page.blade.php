@extends('layouts.app')
@include('layouts.defaultpart')

@section('title',$detail->title)
@section('description',$detail->description)
@section('image',$detail->imagePath())
@section('breadcrumbs')
{{ Breadcrumbs::render('page',$detail) }}
@stop



@section('content')
<div class="panel panel-default" itemscope itemtype="http://schema.org/Article">
  <div class="panel-heading"><h1 itemprop="name">{{$detail->title}}</h1></div>
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
   <!--  <div class="block">
      <a href="https://px.a8.net/svt/ejp?a8mat=2ZGWQL+C6SKPE+3GRY+HXSGH" target="_blank" rel="nofollow">
        <img border="0" width="250" height="250" alt="" src="https://www23.a8.net/svt/bgt?aid=180507837737&wid=005&eno=01&mid=s00000016171003013000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=2ZGWQL+C6SKPE+3GRY+HXSGH" alt="">


        <a href="https://px.a8.net/svt/ejp?a8mat=2ZGWQL+C6753M+348+1C66K1" target="_blank" rel="nofollow">
          <img border="0" width="250" height="250" alt="" src="https://www24.a8.net/svt/bgt?aid=180507837736&wid=005&eno=01&mid=s00000000404008091000&mc=1"></a>
          <img border="0" width="1" height="1" src="https://www16.a8.net/0.gif?a8mat=2ZGWQL+C6753M+348+1C66K1" alt="">

        </div> -->
        <div id="tweet-list">
          <p><center>
            <a href="https://koikatsu.mykoi.jp/" rel="nofollow" target="_blank">[PR][無料]恋愛や婚活に悩める女性がいい出会いを得るために今すぐ見るべきサイトはこちら</a>
          </center></p>
          <p><center>
            <a href="https://kaso-trade.com/" rel="nofollow" target="_blank">[PR][無料]仮想通貨って結局稼げるの！？初心者が仮想通貨投資で利益を出す方法まとめ</a>
          </center></p>
          <p><center>
            <a href="http://daigakuzyuken-pro.com/" rel="nofollow" target="_blank">[PR]あの「受験の神様」も使っている勉強法を難関大学合格者が毎週更新中</a>
          </center></p>
          <ul class="list-group noback">
            <li class="list-group-item">
              <p><a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">{{'@kei'}}</a></p>
              <p>このサイト参考にしたら、アトピーが治りました。今まで夜は痒くて痒くて仕方なかったりしたのに助かった。。。<a style="text-decoration: underline;" href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">http://bit.ly/2qB2KIe</p>
              </li>
              <li class="list-group-item">
                <p><a href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">{{'@salesman'}}</a></p>
                <p>営業力ないと生きていけないって知ってた？<a style="text-decoration: underline;" href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">https://xn--wdk7ak.com/subaru/</p>
                </li>
                <li class="list-group-item">
                  <p><a href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">{{'@mama_nerse'}}</a></p>
                  <p><a style="text-decoration: underline;" href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">看護師・介護士のセクハラ被害の実態...</p>
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
                  <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
               </div>
                  <ul class="list-group noback">
                    @foreach($articles as $article)
                    @if($loop->iteration == 1)
                          <li class="list-group-item">
                           <div class="padding-wrap">
                            <div class="col-xs-3 thumbnail">
                              <a class="thumbnail-link" href="https://lim-jp.com/archives/449">
                                <img src="https://top.tsite.jp/static/top/sys/contents_image/036/631/669/36631669_107803.jpg" alt="【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...">
                              </a>
                            </div>
                            <div class="col-xs-9 title">
                              <a class="title-link" href="https://lim-jp.com/archives/449">
                               【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...
                             </a>
                             <a class="description-link">
                              @php
                              echo mb_strimwidth("ローラのインスタグラムは「写真が素敵」「服が可愛い」と何かと話題です。最近でもニュースになった「バギー」や「ジム」の画像から、ローラの写真加工に関する情報もまとめてみました。", 0, 120, '', 'utf8');
                              @endphp
                            </a>
                          </div>
                          <div class="clear"></div>
                          <div class="col-xs-12 cat">
                            <span class="cat-item">
                              芸能
                            </span>
                            <span class="cat-domain">
                              @php
                              echo parse_url("https://lim-jp.com/archives/449", PHP_URL_HOST);
                              @endphp
                            </span>
                            <a href="https://lim-jp.com/archives/449" class="link-btn">サイトへ</a>
                          </div>
                          <span class="view">{{$article->view * 2 + 32}} view</span>
                        </div>
                      </li>
                      @endif
                    <li class="list-group-item">
                      <div class="padding-wrap">
                        <div class="col-xs-3 thumbnail">
                          <a class="thumbnail-link" href="{{$article->path()}}">
                            <img src="{{$article->thumbnailPath()}}" alt="{{$article->title}}">
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
