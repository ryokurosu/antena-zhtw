@if(url()->full() == url('/'))
@section('title',config('app.name'))
@section('description'){{config('app.name')}}では @php echo \App\Word::where('id','>',0)->get()->implode('text',','); @endphp についての情報がまとめられてます。@stop
@else
@section('title')-{{config('app.name')}}@append
@section('description')。{{config('app.name')}}では @php echo \App\Word::where('id','>',0)->get()->implode('text',','); @endphp についての情報がまとめられてます。@append
@endif



<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!--   <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script> -->

    <meta property="og:title" content="@yield('title')">
    <meta name="twitter:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="description" content="@yield('description')">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{config('app.name', 'Laravel')}}">
    <meta property="og:locale" content="ja_JP">
    <meta property="fb:app_id" content="339751459830292">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="{{config('app.domain')}}">
    <meta property="og:image" content="@yield('image',url('/thumbnail.jpg'))">
    <meta name="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:image" content="@yield('image',url('/thumbnail.jpg'))">
    <link rel="shortcut icon" href="{{url('/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url('/favicon.ico')}}">
    <link rel="canonical" href="{{url()->current()}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{env('GA_TAG')}}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{env("GA_TAG")}}');
    </script>
   <!--  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-5105681373982866",
        enable_page_level_ads: true
      });
    </script>
  -->


</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button> -->

                      <!-- Branding Image -->
                      <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                      </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                      <!-- Left Side Of Navbar -->
                      <ul class="nav navbar-nav">
                        &nbsp;
                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <!-- <li><a href="{{ route('login') }}">Login</a></li> -->
                        <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                            <li>
                              <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                          </li>
                        </ul>
                      </li>
                      @endguest
                    </ul>
                  </div>
                </div>
              </nav>
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    @yield('content')
                  </div>
                  <div class="col-xs-12 col-md-6" id="sidebar">
                    <div class="block">
                      <center>
                        <a href="https://px.a8.net/svt/ejp?a8mat=2ZF26E+E4GAHE+348+1TXR8X" target="_blank" rel="nofollow">
                          <img border="0" width="468" height="60" alt="" src="https://www24.a8.net/svt/bgt?aid=180421574854&wid=005&eno=01&mid=s00000000404011075000&mc=1"></a>
                          <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=2ZF26E+E4GAHE+348+1TXR8X" alt="">
                        </center>
                      </div>
                      <div class="block">
                        <center>
                          <a href="https://px.a8.net/svt/ejp?a8mat=2ZF26G+9XTMFM+5KU+6BEQ9" target="_blank" rel="nofollow">
                            <img border="0" width="320" height="50" alt="" src="https://www26.a8.net/svt/bgt?aid=180421576601&wid=005&eno=01&mid=s00000000723001061000&mc=1"></a>
                            <img border="0" width="1" height="1" src="https://www19.a8.net/0.gif?a8mat=2ZF26G+9XTMFM+5KU+6BEQ9" alt="">
                          </center>
                        </div>
                        <div class="block">
                          <center>
                            <a href="http://bit.ly/2qB2KIe" target="_blank" rel="nofollow">
                              <img border="0" width="320" height="50" alt="" src="https://cdn-ak.f.st-hatena.com/images/fotolife/Y/YukaYuka-atopy/20170809/20170809043340.jpg"></a>
                            </center>
                          </div>
                          <ul class="list-group">
                            <li class="list-group-item active">人気記事</li>
                            @foreach(\App\Article::popular()->take(20)->get() as $article)
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
                      <ul class="list-group">

                        <div class="block">
                          <center>
                            <a href="http://bit.ly/2oiQ0UJ" target="_top" style="position: relative; display:block;"><div style="position:absolute;width:100%;height:100%;z-index:1;"></div><iframe scrolling="no" style="width: 300px; height: 250px; border: none; outline: none; display: block;" src="https://s3-ap-northeast-1.amazonaws.com/highlow-affiliate-banner/html5/56c69b619378f/banner.html"></iframe></a>

                          </center>
                        </div>
                        <div class="block">
                          <center>
                           <a href="https://px.a8.net/svt/ejp?a8mat=2ZF26G+9WMR82+1LW6+HZ2R6" target="_blank" rel="nofollow">保証人不要・全国対応のローン！</a>
                           <img border="0" width="1" height="1" src="https://www14.a8.net/0.gif?a8mat=2ZF26G+9WMR82+1LW6+HZ2R6" alt="">
                         </center>
                       </div>

                       <li class="list-group-item active">新着記事</li>
                       @foreach(\App\Article::latest()->take(20)->get() as $article)
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

                  <center>
                    <div id="hitbtc-ticker" class="hit-medium" data-hue="-5"></div>
                    <script type="text/javascript">
                      (function() {
                        var po = document.createElement("script");
                        po.type = "text/javascript";
                        po.async = true;
                        po.src = "https://hitbtc.com/get_widget?pair=ethbtc";
                        var s = document.getElementsByTagName("script")[0];
                        s.parentNode.insertBefore(po, s);
                      })();
                    </script>
                  </center>


                  <ul class="list-group">
                    <li class="list-group-item active">タグ</li>
                  </ul>
                  <div id="tag-area">
                    @foreach(\App\Word::inRandomOrder()->get() as $word)
                    @php
                    $font = (100 + rand(1,60)) / 10;
                    $opacity = $font / 16;
                    @endphp
                    <a class="tag" href="{{$word->path()}}" style="font-size:{{$font}}px;opacity:{{$opacity}}">{{$word->text}}</a>
                    @endforeach
                  </div>

                  <div class="block">
                    <center>
                      <a href="https://px.a8.net/svt/ejp?a8mat=2ZF26G+9XTMFM+5KU+65EOH" target="_blank" rel="nofollow">
                        <img border="0" width="468" height="60" alt="" src="https://www20.a8.net/svt/bgt?aid=180421576601&wid=005&eno=01&mid=s00000000723001033000&mc=1"></a>
                        <img border="0" width="1" height="1" src="https://www18.a8.net/0.gif?a8mat=2ZF26G+9XTMFM+5KU+65EOH" alt="">
                      </center>
                    </div>

                  </div>
                </div>

                <footer>
                  <p style="margin:0;padding:16px 0;color:#aaa;text-align:right;font-size:.8rem;">© 2018 {{config('app.name')}}</p>
                </footer>

                <!-- Scripts -->
                <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <script>
                  /* DOMの読み込み完了後に処理 */
                  if(window.addEventListener) {
                    window.addEventListener( "load" , shareButtonReadSyncer, false );
                  }else{
                    window.attachEvent( "onload", shareButtonReadSyncer );
                  }

                  /* シェアボタンを読み込む関数 */
                  function shareButtonReadSyncer(){
                    LineIt.loadButton();
// Facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Google+
var scriptTag = document.createElement("script");
scriptTag.type = "text/javascript"
scriptTag.src = "https://apis.google.com/js/platform.js";
scriptTag.async = true;
document.getElementsByTagName("head")[0].appendChild(scriptTag);

// はてなブックマーク
var scriptTag = document.createElement("script");
scriptTag.type = "text/javascript"
scriptTag.src = "https://b.st-hatena.com/js/bookmark_button.js";
scriptTag.async = true;
document.getElementsByTagName("head")[0].appendChild(scriptTag);

// pocket
(!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js"));

}
</script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
