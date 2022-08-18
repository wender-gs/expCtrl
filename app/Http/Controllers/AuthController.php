<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard() {
        if(Auth::check()) {

            $transaction = new Transactions();

            return view('admin.dashboard', [
                'totalExpenses' => $transaction->getSomaExpense()[0]->totalExpense,
                'totalRecipe' => $transaction->getSomaRecipe()[0]->totalRecipe
            ]);
        }

        return redirect()->route('admin.login');
        
    }

    public function showLoginForm() {
        if(Auth::check()) {
            return redirect()->route('admin');
        }

        return view('admin.formLogin');
    }

    public function login(Request $request){

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->withErrors(['O e-mail informado não e válido.']);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->withErrors(['Usúario ou senha incorretos.']);
        
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('admin');

        
    }
}