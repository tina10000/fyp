<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function authenticated($request, $user)
    {
        if ($user->user_type == '1') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_type == '2') {
            return redirect()->route('secretary.dashboard');
        }
    }
}
