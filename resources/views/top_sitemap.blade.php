<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>2018-01-20</lastmod>
    </url>
    @foreach($words as $v)
    <url>
        <loc>{{ url('/word/'.$v->id) }}</loc>
        <lastmod>{{ $v->updated_at->format('Y-m-d')}}</lastmod>
    </url>
    @endforeach
</urlset>


