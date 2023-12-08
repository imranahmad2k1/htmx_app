<ul>
    @foreach ($news as $single_news)
        <li>{{ $single_news->news }}</li>
    @endforeach
</ul>
