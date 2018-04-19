<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach(\App\Article::where('id','>',($id-1)*10000)->where('id','<=',$id*10000)->get() as $v)
    <url>
        <loc>{{ $v->path() }}</loc>
        <lastmod>{{ $v->updated_at->format('Y-m-d') }}</lastmod>
        <image:image>
        <image:loc>{{ $v->imagePath() }}</image:loc>
        <image:title>{{ $v->title }}</image:title>
    </image:image>
</url>
<url>
    <loc>{{ $v->listpath() }}</loc>
    <lastmod>{{ $v->updated_at->format('Y-m-d') }}</lastmod>
</url>
@endforeach
</urlset>


