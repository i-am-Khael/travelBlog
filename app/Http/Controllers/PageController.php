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
        $articles = Article::where('featured', true)->orderBy('created_at', 'desc')->get();

        $data = [
            'header' => $header,
            'articles' => $articles
        ];

        return view('pages.index', $data );

    }

    public function article() {

        $articles = Article::orderBy('created_at','desc')->paginate(6);
        return view('pages.articles', [ 'articles' => $articles ]);

    }


    public function viewArticle($id) {

        $article = Article::findOrFail($id);
        return view('pages.viewArticle', [ 'article' => $article ]);

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
