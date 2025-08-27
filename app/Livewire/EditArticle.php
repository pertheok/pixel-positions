<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;

class EditArticle extends AdminComponent
{
    public ?Article $article;

    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public function mount(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->article = $article;
    }

    public function save()
    {
        $this->validate();

        $this->article->update($this->only('title', 'content'));

        $this->redirect('/lw/dashboard/articles', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
