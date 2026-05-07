<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Serie;
use App\Models\Category;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalSeries' => Serie::count(),
            'totalCategories' => Category::count(),
            'latestSeries' => Serie::latest()->take(5)->get()
        ])
        ->layout('layouts.app');
    }
}