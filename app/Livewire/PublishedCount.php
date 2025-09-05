<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(isolate: false)] // Lazy components are isolated by default, this will bundle them with other components
class PublishedCount extends Component
{
    public $placeholderText = '';

    #[Computed(cache: true, key: 'published-count')] 
    // cache: true keeps the value cached until the component is refreshed or the property is unset
    // key: 'published-count' sets a custom cache key so it can be accessed or broken specifically
    
    public function count()
    {
        sleep(1);

        return Article::where('published', 1)->count();
    }

    public function placeholder()
    {
        return view('livewire.placeholder', [
            'message' => $this->placeholderText,
        ]);
    }

    public function render()
    {
        return view('livewire.published-count');
    }
}
