<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $name;
    public $category_id;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.min' => 'O nome da categoria deve ter no mínimo 3 caracteres.',
        ];
    }

    public function save()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Erro de validação: ' . implode(', ', $e->validator->errors()->all()));
            return;
        }

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->resetFields();
        session()->flash('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $category = Category::findOrFail($this->category_id);
        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->resetFields();
        session()->flash('success', 'Categoria atualizada!');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'Categoria removida!');
    }

    public function resetFields()
    {
        $this->reset([
            'name',
            'category_id',
            'isEditing'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.categories', [
            'categories' => Category::latest()->get()
        ])->layout('layouts.app');
    }
}