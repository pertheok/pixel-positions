<div>
    <div wire:offline>
        You are offline
    </div>

    @foreach ($articles as $article)
        <div class="mt-5 p-3" wire:key="{{ $article->id }}">
            <h3 
                class="text-2xl text-blue-500 mb-3 hover:text-blue-700"
                wire:offline.class.remove="text-blue-500 hover:text-blue-700"
                {{-- wire:offline.class="text-blue-500 hover:text-blue-700" --}} 
            >
                <a href="{{ route('lw.articles.show', $article) }}">{{ $article->title }}</a>
            </h3>
            <p>
                {{ str($article->content)->words(30) }}
            </p>
        </div>
    @endforeach
</div>
