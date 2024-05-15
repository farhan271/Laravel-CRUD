<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view ('authh.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('crud');
        }
    
        // Authentication failed
        return redirect('login')->with('error', 'Invalid credentials');
    }

   public function register_view()
   {
    return view ('authh.register');
   }
   
   public function register (Request $request)
   {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed'],
    ]);
   
    $user = new User();
    $user->email = $request->email;
    $user->name = $request->name;
$user->password = Hash::make($request->password);
$user->save();

Auth::login($user);

return redirect()->route('crud');
   }

   
}