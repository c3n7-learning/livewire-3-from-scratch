<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
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
        $this->resetPage(pageName: 'articles-page');
    }

    public function showPublished()
    {
        $this->showOnlyPublished = true;
        $this->resetPage(pageName: 'articles-page');
    }

    public function render()
    {
        $results = Article::query()
            ->when($this->showOnlyPublished, function (Builder $q) {
                $q->where('published', 1);
            })
            ->paginate(10, pageName: 'articles-page');

        return view('livewire.article-list', [
            'articles' => $results,
        ]);
    }
}
