<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // For public movie listing
    {
        $query = Movie::query();

        // Search filter
        if ($search = request('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Genre filter
        if ($genre = request('genre')) {
            $query->where('genre', $genre);
        }

        // Sort filter
        $sort = request('sort', 'newest');
        $query->orderBy('created_at', $sort === 'newest' ? 'desc' : 'asc');

        // Get genres for filter dropdown
        $genres = Movie::select('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        return view('movies.movies_index', [
            'movies' => $query->paginate(12),
            'genres' => $genres
        ]);
    }

    public function all() // For backend maintenance
    {
    $search = request()->search;

    $movies = Movie::query();

    if($search) {
        $movies->where('title', 'LIKE', "%{$search}%")
               ->orWhere('genre', 'LIKE', "%{$search}%");
    }

    $moviesFromDB = $movies->get();

    return view('movies.movies_all', ['moviesFromDB' => $moviesFromDB]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.movies_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'poster' => 'required|image',
            'trailer_url' => 'nullable|url',
            'description' => 'nullable|max:255',
            'release_date' => 'nullable|date',
            'director' => 'required|max:255',
            'genre' => 'required|max:255',
            'rating' => 'nullable|numeric|min:0|max:10'
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('moviePosters');
        }

        Movie::create($validated);

        return redirect()->route('movies.all')->with('message', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.movies_show', compact('movie'));
    }

    public function publicShow(Movie $movie)
    {
        return view('movies.movies_publicshow', compact('movie'));
    }

    public function toggleFavorite(Movie $movie)
    {
        auth()->user()->favorites()->toggle($movie->id);

        return back()->with('message', $movie->isFavoritedBy(auth()->user())
            ? 'Added to favorites!'
            : 'Removed from favorites!');
    }

    public function favorites()
    {
        $query = auth()->user()->favorites();

        // Apply filters
        if ($search = request('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($genre = request('genre')) {
            $query->where('genre', $genre);
        }

        $sort = request('sort', 'newest');
        $query->orderBy('created_at', $sort === 'newest' ? 'desc' : 'asc');

        $genres = auth()->user()->favorites()
            ->select('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        return view('movies.movies_favs', [
            'movies' => $query->paginate(12),
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.movies_edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
        {
            $movie = Movie::findOrFail($id);

            $validated = $request->validate([
            'title' => 'required|max:50',
            'poster' => 'sometimes|image',
            'trailer_url' => 'nullable|url',
            'description' => 'nullable|max:255',
            'release_date' => 'nullable|date',
            'director' => 'required|max:255',
            'genre' => 'required|max:255',
            'rating' => 'nullable|numeric|min:0|max:10'
        ]);

        if ($request->hasFile('poster')) {
            if ($movie->poster) {
                Storage::delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('moviePosters');
        }

        $movie->update($validated);

        return redirect()->route('movies.show', $movie->id)->with('message', 'Movie updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        // Delete the poster file if it exists
        if ($movie->poster) {
            Storage::delete($movie->poster);
        }

        // Delete the movie
        $movie->delete();

        return redirect()->route('movies.all')->with('message', 'Movie deleted successfully!');
    }
}
