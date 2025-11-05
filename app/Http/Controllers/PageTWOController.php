<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageTWOController extends Controller
{
    public function tutorial()
    {
        return view('user.content.tutorial');
    }
    public function competencia()
    {
        return view('user.content.competencia');
    }
    public function reglas()
    {
        return view('user.content.reglas');
    }
    public function calendario()
    {
        return view('user.content.calendario');
    }
    public function patrocinadores()
    {
        return view('user.content.patrocinadores');
    }

    public function idiomas()
    {
        return view('user.content.dashboard');
    }

    public function marketplace()
    {
        return view('user.content.dashboard');
    }

    public function password()
    {
        return view('user.content.dashboard');
    }

    public function otrasApps()
    {
        return view('user.content.dashboard');
    }

    public function ayuda()
    {
        return view('user.content.dashboard');
    }
}