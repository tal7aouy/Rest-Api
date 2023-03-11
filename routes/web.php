<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'talhaouy@mail.com',
        'password' => 'password'
    ];
    if (!Auth::attempt($credentials)) {
        $user = new User();
        $user->name = "Mhammed";
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin', ['update', 'create', 'delete']);
            $userToken = $user->createToken('update', ['update', 'create']);
            $basicToken = $user->createToken('basic');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $userToken->plainTextToken,
                'basic' => $basicToken->plainTextToken
            ];
        }
    }
});
