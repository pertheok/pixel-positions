<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;

class CreateArticle extends AdminComponent
{
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public function save()
    {
        $this->validate();

        Article::create($this->all());

        $this->redirect('/lw/dashboard/articles', navigate: true);
    }
    public function render()
    {
        return view('livewire.create-article');
    }
}
