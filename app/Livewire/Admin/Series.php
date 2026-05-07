<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Serie;
use App\Models\Category;
use Illuminate\Support\Str;

class Series extends Component
{
    public $title;
    public $description;
    public $release_year;
    public $category_id;
    public $serie_id;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'release_year' => 'required|numeric',
            'category_id' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter no mínimo 10 caracteres.',
            'release_year.required' => 'O ano é obrigatório.',
            'release_year.numeric' => 'O ano deve ser numérico.',
            'category_id.required' => 'Selecione uma categoria.',
        ];
    }

    // ✅ Método único para submit (evita confusão com wire:submit condicional)
    public function submit()
    {
        if ($this->isEditing) {
            $this->update();
        } else {
            $this->save();
        }
    }

    public function save()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Erro de validação: ' . implode(', ', $e->validator->errors()->all()));
            return;
        }

        Serie::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'release_year' => $this->release_year,
            'category_id' => $this->category_id
        ]);

        $this->resetFields();
        session()->flash('success', 'Série criada!');
    }

    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        $this->serie_id = $serie->id;
        $this->title = $serie->title;
        $this->description = $serie->description;
        $this->release_year = $serie->release_year;
        $this->category_id = $serie->category_id;
        $this->isEditing = true;
    }

    public function update()
    {
        try {
            $this->validate();

            $serie = Serie::findOrFail($this->serie_id);
            $updated = $serie->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'description' => $this->description,
                'release_year' => $this->release_year,
                'category_id' => $this->category_id
            ]);

            if ($updated) {
                $this->resetFields();
                session()->flash('success', 'Série atualizada!');
            } else {
                session()->flash('error', 'Falha ao atualizar a série (nenhuma alteração).');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Erro de validação: ' . implode(', ', $e->validator->errors()->all()));
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao atualizar série: ' . $e->getMessage());
            \Log::error($e->getMessage(), $e->getTrace());
        }
    }

    public function delete($id)
    {
        Serie::findOrFail($id)->delete();
        session()->flash('success', 'Série removida!');
    }

    public function resetFields()
    {
        $this->reset([
            'title',
            'description',
            'release_year',
            'category_id',
            'serie_id',
            'isEditing'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.series', [
            'series' => Serie::with('category')->latest()->get(),
            'categories' => Category::orderBy('name')->get()
        ])->layout('layouts.app');
    }
}