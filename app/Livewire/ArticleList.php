<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
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

    #[Computed()]
    public function articles()
    {
        return Article::query()
            ->when($this->showOnlyPublished, function (Builder $q) {
                $q->where('published', 1);
            })
            ->paginate(10, pageName: 'articles-page');
    }

    public function delete(Article $article)
    {
        // By accessing the articles variable, a cache is set for this request.
        // #Computed caches the variable per request.
        // So, by the time the articles are rendered, we have already filled our cache
        // The delete item will seem from the UI to not be deleted,
        // but on refresh the UI, you'll see that the item was deleted
        if ($this->articles->count() < 10) {
            info(__METHOD__);
        }

        $article->delete();

        unset($this->articles);
        cache()->forget('published-count');
    }

    public function togglePublished($showOnlyPublished)
    {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage(pageName: 'articles-page');
    }

    // public function render()
    // {
    //     return view('livewire.article-list');
    // }
}
