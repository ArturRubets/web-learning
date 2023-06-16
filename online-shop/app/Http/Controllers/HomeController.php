<?php

namespace App\Http\Controllers;

use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    #[NoReturn] public function index(): void
    {
        dd('Home page');
    }
}
