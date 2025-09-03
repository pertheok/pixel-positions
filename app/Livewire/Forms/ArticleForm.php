<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleForm extends Form
{
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public ?Article $article;

    #[Locked] // Prevents any updates to the tagged property
    public int $id;

    public $published = false;
    public $notifications = [];
    public $allowNotifications = false;
    public $photo_path = '';

    #[Validate('image|max:1024')]
    public $photo;

    public function setArticle(Article $article)
    {
        $this->article = $article;
        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->photo_path = $article->photo_path;

        $this->allowNotifications = count($this->notifications) > 0;
    }

    public function store()
    {
        $this->validate();

        if(!$this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo)  {
            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));
        cache()->forget('published-count'); // clear the cache for the PublishedCount component
    }

    public function update()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo)  {
            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));
        cache()->forget('published-count'); // clear the cache for the PublishedCount component
    }
}
