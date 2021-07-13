{{-- create component for each repetitive part : header, footer, cards --}}
<div>
    <div class="p-5 text-4xl text-gray-500 bg-gray-700 boder sm:bg-blue-400 md:text-5xl lg:bg-green-300">{{ $title }}</div>
    <div class='text-center border lg:flex'> {!!  $content !!} </div>
    {{-- create a lot of component that will show based on specific condition --}}
    {{-- in the controller for products/service send all entries from the table to the view --}}
    {{-- can use a condition inside the main controller to call data for specific table products/services --}}
    @if(str_contains(strtolower($title),'contact'))
    @livewire('counter')
    @endif
    <div class="border">
        <img src="{{ asset('storage/img/Youfoodshutterbug.jpg') }}" alt="">
    </div>
</div>
{{-- create controller for service and product and a whole system for reservation --}}
{{-- products and service will need their own controller similar to frontpage controller to include all datas of products and services --}}
{{-- specify routes for controller for each new component products/services with their own view and datas from database --}}

