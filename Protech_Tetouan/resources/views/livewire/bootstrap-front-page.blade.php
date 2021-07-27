
 <x-header :topNavLinks='$topNavLinks'></x-header>
<div class="container mt-4 body page">
        @if(str_contains(strtolower($title),'home'))
        <x-carousel></x-carousel>
        @endif

        <div class="h3">{{ $title }}</div>
        <div class="text-danger">{!! $content !!}</div>

        @if(str_contains(strtolower($title),'contact'))
                <x-contact-form></x-contact-form>
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
                @foreach ( $services as $service )
                <x-service :service='$service'></x-service>  
                @endforeach
        @endif
        @if(str_contains(strtolower($title),'reference'))
        <x-references></x-references>
        @endif
</div>
<x-footer></x-footer>
        