<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use WithPagination;

    #[Session(key: 'published')]
    public $showOnlyPublished = false;

    // key property allows for reference in the code by the provided value

    #[Computed(/*persist: true*/)] 
    // Computed property, caches the return value - those can be accessed in the view itself without passing it in the render()
    // persist: true keeps everything cached until page is refreshed or the property is unset - that would need to break the cache on every interaction to work properly

    public function articles()
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return $query->paginate(10, pageName: 'articles-page'); // pageName is only needed if we intend to include multiple paginators - query parameter in the URL changes
    }
    
    public function delete(Article $article)
    {
        if ($this->articles->count() < 45) {
            throw new \Exception('Cannot delete articles when there are less than 45 articles in the database.');
        }

        $article->delete();
        unset($this->articles); // break the cache
        cache()->forget('published-count'); // clear the cache for the PublishedCount component
    }

    public function togglePublished($showOnlyPublished)
    {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage(pageName: 'articles-page'); // resetPage() does not need a page name by default, only if we have multiple paginators
    }

    // public function render() // using computed property makes render() unnecessary in most cases
    // {
    //     return view('livewire.article-list');
    // }
}
