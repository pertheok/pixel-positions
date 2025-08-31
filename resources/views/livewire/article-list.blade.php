<div>
    <div class="mb-3 flex justify-between items-center">
        <a 
            href="/lw/dashboard/articles/create" 
            class="text-blue-500 hover:text-blue-700"
            wire:navigate
        >
            Create Article
        </a>

        <div>
            <button class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showAll()"
            >
                Show all
            </button>

            <button class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showPublished()"
            >
                Show published (<livewire:published-count placeholder-text="Loading..." />) {{-- add lazy property to lazily load --}}
            </button>
        </div>
    </div>

    <div class="my-3">
        {{ $articles->links(data: ['scrollTo' => 'table.w-full']) }} {{-- set to false to disable scrolling when changing pages --}}
    </div>

    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr wire:key="{{ $article->id }}" class="border-b bg-gray-800 border-gray-700">
                    <td class="px-6 py-3">{{ $article->title }}</td>
                    <td class="px-6 py-3">
                        <a 
                            href="/lw/dashboard/articles/{{ $article->id }}/edit"
                            wire:navigate
                            class="text-gray-200 p-2 rounded-sm bg-indigo-700 hover:bg-indigo-900"
                        >
                            Edit
                        </a>
                        <button 
                            wire:click="delete({{ $article->id }})" 
                            wire:confirm="Are you sure you want to delete this article?"
                            class="text-gray-200 ml-2 p-2 bg-red-700 hover:bg-red-900 rounded-sm"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
