<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;

class CreateArticle extends AdminComponent
{
    public ArticleForm $form;
    
    public function save()
    {
        $this->form->store();

        // $this->redirectIntended('/lw/dashboard'); 
        // This is used to redirect the user to a page that he might not have had an access to when originally attempted to get there (ex. unauthenticated) and redirects them after logging in 

        $this->redirectRoute('dashboard.articles.index', navigate: true);
        // $this->redirect('/lw/dashboard/articles', navigate: true); 
        // navigate: true makes it so instead of a full page reload, only content is reloaded (so not layouts, scripts, assets, etc)
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
