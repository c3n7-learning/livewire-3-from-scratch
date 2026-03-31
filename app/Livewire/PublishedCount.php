<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(isolate: true)]
class PublishedCount extends Component
{
    public $placeholderText = '';

    #[Computed(cache: true, key: 'published-count')]
    public function count()
    {
        sleep(3);

        return Article::where('published', 1)->count();
    }

    public function render()
    {
        return view('livewire.published-count');
    }

    public function placeholder()
    {
        return view('livewire.placeholder', [
            'message' => $this->placeholderText,
        ]);
    }
}
