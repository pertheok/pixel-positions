<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    // #[Url(as: 'q', except: '', history: true)] // outputs the property value in the url string if no options provided
    // "except" property specifies the value that will void this functionality until it changes to something else - in this case if there is no searchText provided.
    // "as" property aliases the parameter name as something else
    // "history" property enables browser history for the URL changes
    public $searchText = '';
    public $placeholder;

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText');
    }

    // Allows for the same functionality as #[Url] and for setting those dynamically
    protected function queryString()
    {
        return [
            'searchText' => [
                'except' => '',
                'as' => 'q',
                'history' => true
            ]
        ];
    }

    public function render()
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'LIKE', "%{$this->searchText}%")->get()
        ]);
    }
}
