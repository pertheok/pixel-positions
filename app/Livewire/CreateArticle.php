<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Attributes\Validate;

class CreateArticle extends AdminComponent
{
    public ArticleForm $form;
    
    public function save()
    {
        $this->form->store();

        $this->redirectRoute('dashboard.articles.index', navigate: true);
        // $this->redirect('/lw/dashboard/articles', navigate: true); 
        // navigate: true makes it so instead of a full page reload, only content is reloaded (so not layouts, scripts, assets, etc)
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
