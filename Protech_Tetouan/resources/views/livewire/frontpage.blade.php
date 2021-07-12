<div>
    <nav class="flex items-center px-3 py-2 bg-gray-900 shadow-lg">
        <div>
            <button class='items-center block h-8 mr-3 text-gray-400'>
                <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <div class="bg-green-500">
            <a href={{ asset('img/img01.jpg') }} >
            </a>
        </div>
        <div class="bg-blue-500">Top nav links</div>
    </nav>
    <div>
        <aside>

        </aside>
    </div>
    <main>
        <section>
            <h1>{{ $title }}</h1>
            <article>
                {!! $content !!} 
            </article>
        </section>
    </main>
</div>