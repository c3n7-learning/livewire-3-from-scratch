<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Attributes\Title;

#[Title('Create Article')]
class CreateArticle extends AdminComponent
{
    public ArticleForm $form;

    public function save()
    {
        $this->form->store();

        $this->redirect('/dashboard/articles', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
