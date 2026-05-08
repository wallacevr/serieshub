<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Serie;

class ShowSerie extends Component
{
    public $slug;

    public $serie;

    public function mount($slug)
    {
        $this->slug = $slug;

        $this->serie = Serie::with('category')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        return view(
            'livewire.show-serie'
        )->layout('layouts.site');
    }
}

