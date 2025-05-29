<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentlyAddedMovies = Movie::orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $genres = Movie::select('genre')
            ->distinct()
            ->pluck('genre')
            ->filter()
            ->values();

        $moviesByGenre = [];
        foreach ($genres as $genre) {
            $moviesByGenre[$genre] = Movie::where('genre', $genre)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $highestRatedMovies = Movie::orderBy('rating', 'desc')
            ->take(8)
            ->get();

        return view('home', [
            'recentlyAddedMovies' => $recentlyAddedMovies,
            'genres' => $genres,
            'moviesByGenre' => $moviesByGenre,
            'highestRatedMovies' => $highestRatedMovies
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
