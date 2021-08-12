@props(["service" => $service])
    <!-- Start Grid -->

            <div class="col">
                <div class="mx-auto mt-4 card" style="width: 24rem;">
                    <img class="card-img-top" src="{{ asset('storage/img/'.$service->picture) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{!! $service->description !!}</p>
                        <p class="card-text">{!! $service->duration !!} minutes</p>
                        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Reserver</a>
                    </div>
                </div>
            
            </div>

    <!-- End Grid -->