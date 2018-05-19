<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
 @php
 $article_volume = ceil(\App\Article::count() / 20000);
 @endphp
 @for($i=0; $i <= $article_volume; $i++)
 <sitemap>
  <loc>{{url('/'.$i.'/sitemap.xml')}}</loc>
</sitemap>
@endfor
</sitemapindex>