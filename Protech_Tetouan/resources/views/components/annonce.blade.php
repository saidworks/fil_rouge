@props(["annonce" => $annonce])


  <div class="mb-3 card" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ asset('storage/img/'.$annonce->image) }}" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $annonce->title }}</h5>
          <p class="card-text">{!! $annonce->body !!}</p>
          <p class="card-text"><small class="text-muted">Last updated 
            {{ \Carbon\Carbon::parse($annonce->updated_at)->diffForHumans() }}</small></p>
        </div>
      </div>
    </div>
  </div>