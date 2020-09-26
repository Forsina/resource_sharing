<?php

namespace App\Http\Controllers;

use App\{Thread, Trending};

class SearchController extends Controller
{
    public function show(Trending $trending)
    {
        $threads = Thread::search(request('q'))->paginate(25);

        if (request()->expectsJson()) {
            return $threads;
            //return Thread::search(request('q'))->paginate(25);
        }

        return view('threads.index', [
            'threads' => $threads,
            'trending' => $trending->get()
        ]);
        /*
        return view('threads.search', [
            'trending' => $trending->get()
        ]);
        */
    }
}