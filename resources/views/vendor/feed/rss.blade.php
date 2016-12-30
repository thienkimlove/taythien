{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:webfeeds="http://webfeeds.org/rss/1.0" xmlns:media="http://search.yahoo.com/mrss/"<?php foreach($namespaces as $n) echo " ".$n; ?>>
    <channel>
        @foreach($items as $item)
        <item>
            <title>{!! $item['title'] !!}</title>
            <link>{{ $item['link'] }}</link>
            <pubDate>{{ $item['pubdate'] }}</pubDate>
        </item>
        @endforeach
    </channel>
</rss>
