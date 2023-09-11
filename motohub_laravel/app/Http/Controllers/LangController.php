<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LangController extends Controller
{

    public function changeLocale(string $locale): RedirectResponse
    {
        if(in_array($locale, ['en', 'es'])){
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}