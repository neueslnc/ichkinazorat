<?php

namespace App\Helper;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class RedirectUserAuthHelper
{

    static public function hasDefaultRouteRole(Request $request)
    {

        switch ($request->user()->user_level->name) {
            case 'super_admin':
                return true;
                break;
        }
    }

    static public function redirectDefaultRole(Request $request)
    {

        if ($request->user()->hasRole("super_admin")) {

            return redirect()->route('superadmin.supervisor.index');
        }
    }
}
