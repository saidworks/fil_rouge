{{-- create component for each repetitive part : header, footer, cards --}}
<div>
    <div class="p-5 text-4xl text-gray-500 bg-gray-700 boder sm:bg-blue-400 md:text-5xl lg:bg-green-300">{{ $title }}</div>
    <div class='text-center border lg:flex'> {!!  $content !!} </div>
    {{-- create a lot of component that will show based on specific condition --}}
    @if(str_contains(strtolower($title),'contact'))
    @livewire('counter')
    @endif
    <div class="border">
        <img src="{{ asset('storage/img/Youfoodshutterbug.jpg') }}" alt="">
    </div>
</div>
{{-- create controller for service and product and a whole system for reservation --}}

