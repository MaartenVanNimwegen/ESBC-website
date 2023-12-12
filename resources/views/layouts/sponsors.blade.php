<h1 class="text-uppercase fw-bold text-center">Sponsors</h1>
<div class="row g-0">
    <div class="col-12 px-5 pb-5">
        <div class="sponsor-slider">
            @foreach ($sponsors as $sponsorItem)
                <div class="news m-5">
                    <div class="row g-0 p-3">
                        <div class="col-12">
                            <h1 class="text-center">{{ $sponsorItem->title }}</h1>
                            <div class="img-parent">
                                <img src="{{ asset("$sponsorItem->picture_location") }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
