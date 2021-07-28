  @props(['topNavLinks' => $topNavLinks])
  <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/')}}"><img src="./img/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="mx-auto navbar-nav">
            @foreach($topNavLinks as $item)
            @if (!str_contains(strtolower($item->slug),'home'))
              <li class="px-4 nav-item"><a class="nav-link" href="{{ url($item->slug) }}">{{ $item->label}}</a></li>
            @endif
           
            @endforeach
          </ul>
        </div>
    </nav>
    <!-- End Nav -->
