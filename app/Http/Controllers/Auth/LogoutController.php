<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\HasAuthenticatedUser;

class LogoutController extends Controller
{
    use HasAuthenticatedUser;
    
    public function __invoke()
    {
        $this->getUser()->tokens()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso!'
        ]);
    }

}
