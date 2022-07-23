<?php

namespace App\Http\Controllers;

use App\Http\Factories\UserCreateFactory;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class AuthController extends BaseController
{
    public function register(Request $request, UserService $userService): User
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validated) {
            throw new Exception('Ошибка валидации');
        }

        $createDto = UserCreateFactory::fromRequest(request());

        $user = $userService->createUser($createDto);

        auth()->login($user, true);

        return $user;
    }

    public function status(User $user): Authenticatable
    {
        return $user;
    }

    public function auth(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validated) {
            throw new Exception('Ошибка валидации');
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            return response()->json($user);
        } else {
            throw new Exception('Ошибка валидации');
        }
    }
}
