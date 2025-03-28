<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $response['provinces'] = Province::get();
        //Logger
        $this->Logger->log('info', 'Entrou em Criar uma Conta de Utilizador');
        return view('auth.register', $response);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:40',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(11)->mixedCase()->symbols()->numbers()],
            'province_ref' => 'required|string',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'province_ref' => $request->province_ref,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Logger
        $this->Logger->log('info', 'Criou uma conta de Utilizador de '.$user->name);

        return redirect()->route('admin.user.index')->with('create', '1');
    }
}
