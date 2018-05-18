@if (count($breadcrumbs))

    <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a href="{{ $breadcrumb->url }}" itemprop="item" ><span itemprop="name">{{ $breadcrumb->title }}</span></a></li>
            @else
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><span itemprop="name">{{ $breadcrumb->title }}</span></li>
            @endif

        @endforeach
    </ol>

@endif
