<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Traits\HasAuthenticatedUser;

class MeController extends Controller
{
    use HasAuthenticatedUser;

    public function __invoke()
    {
        return new AuthResource(
            $this->getUser()
        );
    }
}
