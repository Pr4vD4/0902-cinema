<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'login' => 'required|min:3',
                'password' => 'required|min:6',
                'remember' => 'boolean'
            ]);

            if (Auth::attempt([
                'login' => $validated['login'],
                'password' => $validated['password']
            ], $validated['remember'] ?? false)) {
                $request->session()->regenerate();

                return response()->json([
                    'success' => true
                ]);
            }

            throw ValidationException::withMessages([
                'login' => ['Неверный логин или пароль']
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'general' => ['Произошла ошибка при авторизации']
                ]
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
