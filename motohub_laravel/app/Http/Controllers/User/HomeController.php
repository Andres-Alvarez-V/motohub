<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(): RedirectResponse
    {
        if (auth()->user()->role == config('constants.ROLE_ADMIN')) {
            return redirect()->route('admin.home');

        }

        return redirect()->route('user.home');
    }

    public function home(): View
    {
        $client = new Client();
        $url = "http://projects-for-me.tech/api/products";

        $apiData = $client->request('GET', $url);
        $contentData = json_decode($apiData->getBody()->getContents(), true);

        $viewData['products'] = $contentData;
        return view('user.home')->with('viewData', $viewData);
    }
}
