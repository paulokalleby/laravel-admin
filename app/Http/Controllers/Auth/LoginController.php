<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{    
    public function __invoke(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
    
        if ( !$user || !Hash::check($request->password, $user->password) ) {
            
            throw ValidationException::withMessages([
    
                'message' => ['As credenciais fornecidas estão incorretas.'],
            
            ]);
            
        }

        if( $user->active == false ) {

            throw ValidationException::withMessages([
    
                'message' => ['A conta do usuário está inativa.'],
            
            ]);
        }

        $user->tokens()->delete(); // single access
        
        return (new UserResource($user))->additional([
            'token' => $user->createToken($request->device)->plainTextToken
        ]);

    }

}
