<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_g()
    {
        return view('auth.login');
    }
    public function login_p(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $roleRedirects = [
                'Admin' => [
                    'route' => 'admin.dashboard',
                    'msg' => 'Masuk sebagai Admin berhasil!',
                ],
                'Employee' => [
                    'route' => 'employee.dashboard',
                    'msg' => 'Masuk sebagai Employee berhasil!',
                ],
                'Engineer' => [
                    'route' => 'engineer.dashboard',
                    'msg' => 'Masuk sebagai Engineer berhasil!',
                ],
            ];

            foreach ($roleRedirects as $role => $data) {
                if ($user->hasRole($role)) {
                    return redirect()->route($data['route'])->with('message', $data['msg']);
                }
            }

            // Jika role tidak dikenali, tendang keluar
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Akun Anda tidak memiliki hak akses yang sesuai.',
            ]);
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }
    public function register_g()
    {
        return view('auth.register');
    }
    public function register_p(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' berarti harus ada input name="password_confirmation" di view
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('auth.login_g')->with('message', 'Registrasi berhasil! Silahkan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan
        return redirect()->route('auth.login_g')->with('message', 'Anda telah keluar.');
    }
}
