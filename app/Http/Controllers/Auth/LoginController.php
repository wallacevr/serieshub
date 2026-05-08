<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;

use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Exibe tela de login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Realiza autenticação
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [

            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',

            'password.required' => 'A senha é obrigatória.',

        ]);

        $user = User::where(
            'email',
            $request->email
        )->first();

        if (!$user) {

            throw ValidationException::withMessages([
                'email' => 'Usuário não encontrado.'
            ]);
        }

        $senhaComPrefixo =
            $request->password .
            config('auth.PREFIXO_SERIESHUB');

        if (
            !Hash::check(
                $senhaComPrefixo,
                $user->password
            )
        ) {

            throw ValidationException::withMessages([
                'password' => 'Senha inválida.'
            ]);
        }

        Auth::login(
            $user,
            $request->remember
        );

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}