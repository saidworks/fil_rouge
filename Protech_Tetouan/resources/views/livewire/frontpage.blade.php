<div class="divide-y divide-gray-800" x-data="{open:false,showText:false,randomVariable:'random text'}">
    <nav class="flex items-center px-3 py-2 bg-gray-900 shadow-lg">
        <div>
            <button @click="open === true ? open = false : open = true " class='items-center block h-8 mr-3 text-gray-400 hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden'>
                <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path x-show="!open" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    <path x-show="open" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                </svg>
            </button>
        </div>
        <div class="flex items-center w-full h-12">
            <a href="{{ url('/') }}" class="w-full" >
               <img class="h-12" src="{{ asset('storage/img/logo_white.png') }}">
            </a>
        </div>
        <div class="flex justify-end sm:w-8/12">
            <ul class="hidden text-xs text-gray-200 sm:block sm:text-left">
               <a href="{{ url('/login') }}">
                    <li class="px-4 py-2 cursor-pointer hover:underline">Login</li>
               </a>
            </ul>
        </div>
    </nav>
    <div class="sm:flex sm:min-h-screen">
        <aside class="text-gray-700 bg-gray-900 divide-y divide-gray-900 divide-dashed sm:w-4/12">
            {{-- Desktop Web view --}}
            @foreach ($sideBarlinks as $item)
            <ul class="hidden text-xs text-gray-200 sm:block sm:text-left">
                <a href="{{ url($item->slug) }}"> <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800">  {{ $item->label}} </li></a>
            </ul>
            @endforeach
            
            {{-- Mobile Web view --}}
            <div class="block pb-3 divide-y divide-gray-800 sm:hidden" :class="open ? 'block' : 'hidden'">
                <ul class="text-xs text-gray-200">
                    <a href="{{ url('home') }}"> <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-200">
                        Home
                    </li></a>
                    <a href="{{ url('/about') }}"> <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800">
                        About
                    </li></a>
                    <a href="{{ url('/contact') }}"> <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800">
                        Contact
                    </li></a>
                </ul>
            {{-- Top Navigation Mobile Web view --}}
                <ul class="text-xs text-gray-200" >
                    <a href="{{ url('login') }}"> <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800">
                        Login
                    </li></a>
                </ul>
            </div>
        </aside>
        <main class="min-h-screen p-12 p-16 bg-gray-100 sm:w-8/12 md:w-9/12 lg:w-10/12">
            <section class="text-green-900 divide-y">
                <h1 class="text-3xl">{{ $title }}</h1>
                <article>
                    <div class="text-sm">
                        {!! $content !!} 
                    </div>
                    
                </article>
            </section>
        </main>
    </div>
 
</div>