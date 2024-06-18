<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) 
        {
            $usertype = Auth()->user()->user_type;

            if ($usertype == 'user')
            {
                return app()->call([ProductController::class, 'index']);
            }
        }
    }
}
