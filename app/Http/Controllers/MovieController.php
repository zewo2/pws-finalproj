<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->search;

        $moviesFromDB = DB::table('movies');

        if($search) {
            $moviesFromDB = $moviesFromDB->where('title', 'LIKE', "%{$search}%")
                ->orWhere('genre', 'LIKE', "%{$search}%");
        }

        $moviesFromDB = $moviesFromDB->get();

        return view('movies.movies_all', compact('moviesFromDB'));
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
    public function show(string $id)
    {
        $movie = DB::table('movies')
            ->where('id', $id)
            ->first();

        return view('movies.movies_show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = DB::table('movies')
            ->where('id', $id)
            ->first();

        return view('movies.movies_edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        $movie = Movie::findOrFail($id);

        if ($request->hasFile('poster')) {
            // Delete old poster if exists
            if ($movie->poster) {
                Storage::delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('moviePosters');
        }

        $movie->update($validated);

        return redirect()->route('movies.show', $id)->with('message', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return back();
    }
}
