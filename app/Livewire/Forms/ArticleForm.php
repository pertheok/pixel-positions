<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleForm extends Form
{
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public ?Article $article;

    public $published = false;
    public $notification = 'none';

    public function setArticle(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
    }

    public function store()
    {
        $this->validate();

        Article::create($this->only(['title', 'content']));
    }

    public function update()
    {
        $this->validate();

        $this->article->update($this->only(['title', 'content']));
    }
}
