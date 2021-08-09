
 <x-header :topNavLinks='$topNavLinks'></x-header>
<div class="container mt-4 body page">
        {{-- home --}}
        @if(str_contains(strtolower($title),'home'))
                <x-carousel></x-carousel>
        @endif
        @if(!str_contains(strtolower($title),'home'))
        <div class="h2 font-weight-bold">{{ $title }}</div>
        @endif
        <div class="text-muted h4">{!! $content !!}</div>
        @if(str_contains(strtolower($title),'home'))
        <div class="container mt-4">
                @foreach ( $annonces as $annonce )
                <x-annonce :annonce='$annonce'></x-annonce>  
                @endforeach
        </div>
        @endif
        @if(str_contains(strtolower($title),'sommes'))
                <x-qui-sommes-nous></x-qui-sommes-nous>
        @endif
        @if(str_contains(strtolower($title),'contact'))
                {{-- <x-contact-form></x-contact-form> --}}
                @livewire('contact-form')
        @endif
        @if(str_contains(strtolower($title),'produit'))
        <div class="container mt-4">
                <div class="row">
                        @foreach ( $products as $product )
                        <x-product :product='$product'></x-product>  
                        @endforeach
                
                </div>
        </div>
       @endif
       @if(str_contains(strtolower($title),'service'))
       <div class="container mt-4">
                <div class="row">
                @foreach ( $services as $service )
                <x-service :service='$service'></x-service>  
                @endforeach
                </div>
        </div>
        @endif
        @if(str_contains(strtolower($title),'reference'))
        <x-references></x-references>
        @endif
</div>
<x-footer></x-footer>
        