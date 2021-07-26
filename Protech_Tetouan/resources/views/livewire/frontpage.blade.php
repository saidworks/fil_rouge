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
        {{-- Top navigation left --}}
        <div class="flex items-center w-full h-12">
            <a href="{{ url('/') }}" class="w-full" >
               <img class="h-12" src="{{ asset('storage/img/logo_white.png') }}">
            </a>
        </div>
        {{-- Top navigation right --}}
        <div class="flex justify-end sm:w-8/12">
            @foreach ($topNavLinks as $item)
            <ul class="hidden text-xs text-gray-200 sm:flex sm:text-left">
               <a href="{{ url($item->slug) }}">
                    <li class="px-4 py-2 cursor-pointer hover:underline">{{ $item->label}}</li>
               </a>
            </ul>
            @endforeach
        </div>
    </nav>
    <div class="sm:flex sm:min-h-screen">
        <aside class="text-gray-700 bg-gray-900 divide-y divide-gray-900 divide-dashed sm:w-4/12">
            {{-- Desktop Web view --}}
            @foreach ($sideBarLinks as $item)
            <ul class="hidden text-xs text-gray-200 sm:block sm:text-left">
                <a href="{{ url($item->slug) }}"> 
                    <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                        {{ $item->label}} 
                    </li>
                </a>
            </ul>
            @endforeach
            
            {{-- Mobile Web view --}}
            <div class="block pb-3 divide-y divide-gray-800 sm:hidden" :class="open ? 'block' : 'hidden'">
                @foreach ($sideBarLinks as $item)
                    <ul class="text-xs text-gray-200">
                        <a href="{{ url($item->slug) }}"> 
                            <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                                {{ $item->label}} 
                            </li>
                        </a>
                    </ul>
                @endforeach
            {{-- Top Navigation Mobile Web view --}}
            @foreach ($topNavLinks as $item)
                <ul class="text-xs text-gray-200">
                    <a href="{{ url($item->slug) }}"> 
                        <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                            {{ $item->label}} 
                        </li>
                    </a>
                </ul>
            @endforeach
            </div>
        </aside>
        <main class="min-h-screen p-12 m-16 bg-gray-100 sm:w-8/12 md:w-9/12 lg:w-10/12">
            <section class="text-green-900 divide-y">
                <h1 class="text-3xl">{{ $title }}</h1>
                <article>
                    <div class="text-sm">
                        {!! $content !!} 
                        @if(str_contains(strtolower($title),'home'))
                        <div class="flex flex-col items-center justify-center md:flex-row">
                            <div class="flex flex-col justify-center mr-0 transition-all duration-1000 ease-in-out md:mr-2">
                                <div slot="bottom-left" class="max-w-xs">
                                    <div class="p-5 m-2 mt-4 shadow-md"><img class="object-scale-down h-30" src="https://s.spielwarenmesse.de/fileadmin/data_archive/Relaunch_Spielwarenmesse/magazine/header/20190618_Header_Memes.jpg" alt="step3">
                                        <div class="mt-1 mb-2 text-xs font-bold text-teal-700 uppercase">Blog post</div>
                                        <div class="mb-2 text-xl font-bold">Big case study</div>
                                        <div class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ut vel facilis iste, dicta est minus alias, aliquam, velit nisi quo assumenda porro dignissimos doloremque temporibus eum saepe aspernatur ab.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center mx-0 transition-all duration-1000 ease-in-out md:mx-4">
                                <div slot="bottom-center" class="max-w-xs">
                                    <div class="p-5 m-2 mt-4 shadow-md"><img class="object-scale-down h-30" src="https://s.spielwarenmesse.de/fileadmin/data_archive/Relaunch_Spielwarenmesse/magazine/header/20190618_Header_Memes.jpg" alt="step3">
                                        <div class="mt-1 mb-2 text-xs font-bold text-teal-700 uppercase">Blog post</div>
                                        <div class="mb-2 text-xl font-bold">Big case study</div>
                                        <div class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ut vel facilis iste, dicta est minus alias, aliquam, velit nisi quo assumenda porro dignissimos doloremque temporibus eum saepe aspernatur ab.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center ml-0 transition-all duration-1000 ease-in-out md:ml-2">
                                <div slot="bottom-right" class="max-w-xs">
                                    <div class="p-5 m-2 mt-4 shadow-md"><img class="object-scale-down h-30" src="https://s.spielwarenmesse.de/fileadmin/data_archive/Relaunch_Spielwarenmesse/magazine/header/20190618_Header_Memes.jpg" alt="step3">
                                        <div class="mt-1 mb-2 text-xs font-bold text-teal-700 uppercase">Blog post</div>
                                        <div class="mb-2 text-xl font-bold">Big case study</div>
                                        <div class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ut vel facilis iste, dicta est minus alias, aliquam, velit nisi quo assumenda porro dignissimos doloremque temporibus eum saepe aspernatur ab.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif(str_contains(strtolower($title),'contact'))
                        <form class="w-full max-w-lg">
                            <div class="flex flex-wrap mb-6 -mx-3">
                              <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                  Nickname
                                </label>
                                <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="nick" type="text">
                                <p class="text-xs italic text-gray-600">Remove if not needed</p>
                              </div>
                            </div>
                            <div class="flex flex-wrap mb-6 -mx-3">
                              <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                  E-mail
                                </label>
                                <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                                <p class="text-xs italic text-gray-600">Some tips - as long as needed</p>
                              </div>
                            </div>
                            <div class="flex flex-wrap mb-6 -mx-3">
                              <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                  Message
                                </label>
                                <textarea class="block w-full h-48 px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none resize-none  no-resize focus:outline-none focus:bg-white focus:border-gray-500" id="message"></textarea>
                                <p class="text-xs italic text-gray-600">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p>
                              </div>
                            </div>
                            <div class="md:flex md:items-center">
                              <div class="md:w-1/3">
                                <button class="px-4 py-2 font-bold text-white bg-teal-400 rounded shadow hover:bg-teal-400 focus:shadow-outline focus:outline-none" type="button">
                                  Send
                                </button>
                              </div>
                              <div class="md:w-2/3"></div>
                            </div>
                          </form>
                        @endif
                    </div>
                    
                </article>
            </section>
        </main>
    </div>
 
</div>