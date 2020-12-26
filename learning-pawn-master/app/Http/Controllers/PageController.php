<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tournament;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'articles' => Article::where( 'published', 1 )->orderBy( 'created_at', 'desc' )->take(4)->get(),
            'tournaments' => Tournament::where( 'published', 1 )->orderBy( 'start_at', 'asc' )->take(3)->get()
        ];
        return view( 'universo.index', $data );
    }
}
