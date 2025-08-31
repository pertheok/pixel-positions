<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use WithPagination;

    public $showOnlyPublished = false;
    
    public function delete(Article $article)
    {
        $article->delete();
    }

    public function showAll()
    {
        $this->showOnlyPublished = false;
        $this->resetPage(pageName: 'articles-page'); // resetPage() does not need a page name by default, only if we have multiple paginators
    }

    public function showPublished()
    {
        $this->showOnlyPublished = true;
        $this->resetPage(pageName: 'articles-page');
    }

    public function render()
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return view('livewire.article-list', [
            'articles' => $query->paginate(10, pageName: 'articles-page'),// pageName is only needed if we intend to include multiple paginators - query parameter in the URL changes
        ]);
    }
}
