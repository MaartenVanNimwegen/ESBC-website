<h1 class="text-uppercase fw-bold text-center">LAATSTE NIEUWS</h1>
<div class="row g-0">
    <div class="col-12 px-5 pb-5">
        <div class="news-slider">
            @foreach ($news as $newsItem)
                <div class="news m-5">
                    <div class="row g-0 p-3">
                        <div class="col-12">
                            <h1>{{ $newsItem->title }}</h1>
                            <p>{{ $newsItem->description }}</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-10"></div>
                        <div class="col-2 date-block">{{ date_format($newsItem->created_at, "j M") }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
