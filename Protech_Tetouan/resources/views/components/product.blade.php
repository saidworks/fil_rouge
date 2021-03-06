@props(["product" => $product])
    <!-- Start Grid -->

            <div class="col">
                <div class="mx-auto mt-4 card" style="width: 24rem;">
                    <img class="card-img-top" src="{{ asset('storage/img/'.$product->picture) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{!! $product->description !!}</p>
                        <p class="card-text text-muted">{!! $product->price !!} DH</p>

                    </div>
                </div>
            
            </div>
  
    <!-- End Grid -->