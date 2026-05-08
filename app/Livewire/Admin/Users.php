<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    public $role = 'user';

    public $formKey = 1;

    protected function rules()
    {
        return [

            'name' => 'required|min:3',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6',

            'role' => 'required',

        ];
    }

    protected function messages()
    {
        return [

            'name.required' => 'O nome é obrigatório.',

            'name.min' => 'O nome deve ter no mínimo 3 caracteres.',

            'email.required' => 'O email é obrigatório.',

            'email.email' => 'Informe um email válido.',

            'email.unique' => 'Este email já está cadastrado.',

            'password.required' => 'A senha é obrigatória.',

            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',

            'role.required' => 'Selecione um nível de acesso.',

        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::create([

            'name' => $this->name,

            'email' => $this->email,

            'password' => Hash::make(
                $this->password .
                config('auth.PREFIXO_SERIESHUB')
            ),

        ]);

        $user->assignRole($this->role);

        $this->resetFields();

        session()->flash(
            'success',
            'Usuário criado com sucesso!'
        );
    }

    public function delete($id)
    {
        if (auth()->id() == $id) {

            session()->flash(
                'error',
                'Você não pode excluir seu próprio usuário.'
            );

            return;
        }

        User::findOrFail($id)->delete();

        session()->flash(
            'success',
            'Usuário removido com sucesso!'
        );
    }

    public function resetFields()
    {
        $this->name = '';

        $this->email = '';

        $this->password = '';

        $this->role = 'user';

        /*
        |--------------------------------------------------------------------------
        | FORÇA RECRIAÇÃO DO FORM
        |--------------------------------------------------------------------------
        */

        $this->formKey++;
    }

    public function render()
    {
        return view(
            'livewire.admin.users',
            [

                'users' => User::latest()->get()

            ]

        )->layout('layouts.app');
    }
}

