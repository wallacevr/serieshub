<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Serie;
use App\Models\Category;

class SeriesByCategory extends Component
{
    public $slug;

    public $search = '';

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = null;

        $query = Serie::with('category');

        if ($this->slug) {

            $category = Category::where(
                'slug',
                $this->slug
            )->first();

            if ($category) {

                $query->where(
                    'category_id',
                    $category->id
                );
            }
        }

        if ($this->search) {

            $query->where(function ($q) {

                $q->where(
                    'title',
                    'like',
                    '%' . $this->search . '%'
                )

                ->orWhere(
                    'description',
                    'like',
                    '%' . $this->search . '%'
                );

            });
        }

        return view('livewire.series-by-category', [

            'series' => $query->latest()->get(),

            'categories' => Category::orderBy('name')->get(),

            'selectedCategory' => $category

        ])->layout('layouts.site');
    }
}