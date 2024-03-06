<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Header;
use App\Models\Article;


class PageController extends Controller
{

    public function index() {

        $header = Header::where('isPublished', true)->orderBy('created_at', 'desc')->get();
        $article = Article::where('featured', true)->get();

        $data = [
            'header' => $header,
            'article' => $article
        ];

        return view('pages.index', $data );

    }

    public function loginPage(Request $request) {

        $this->logout($request);
        return view('login');

    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }

}
