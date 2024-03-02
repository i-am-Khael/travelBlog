<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;

class PageController extends Controller
{

    public function index() {

        $headerData = Header::where('isPublished', true)->get();
        $data = [
            'header' => $headerData
        ];

        return view('pages.index', $data );
    }

    public function loginPage() {
        return view('login');
    }

}
