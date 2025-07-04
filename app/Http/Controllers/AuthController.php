<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.homeadmin');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function edit()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nim' => 'nullable|string|max:20',
            'ipk' => 'nullable|numeric|between:0,4.00',
            'sks' => 'nullable|integer|min:0',
            'prodi' => 'nullable|string|max:100',
            'fakultas' => 'nullable|string|max:100',
            'semester' => 'nullable|integer|min:1',
        ]);

        $user->update($request->only([
            'name', 'email', 'nim', 'ipk', 'sks', 'prodi', 'fakultas', 'semester'
        ]));

        return redirect()->route('user.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
