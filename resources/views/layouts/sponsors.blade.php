<h1 class="text-uppercase fw-bold text-center">Sponsors</h1>
<div class="row g-0">
    <div class="col-12">
        <div class="sponsor-slider">
            @foreach ($sponsors as $sponsorItem)
                <div class="sponsor mx-4 mb-5 mt-2">
                    <div class="row g-0 p-3">
                        <div class="col-12">
                            <div class="img-parent">
                                <a target="_black" name="link-to-sponsor" href="{{ $sponsorItem->url }}"><img
                                        src="{{ asset('storage/' . $sponsorItem->picture_location) }}" alt="sponsor-logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
