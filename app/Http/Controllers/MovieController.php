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
        $request->validate([
            'title' => 'required|max:50',
            'poster' => 'image',
            'genre' => 'required|max:10',
            'director' => 'required|max:25'
        ]);

        $movieData = [
            'title' => $request->title,
            'genre' => $request->genre,
            'director' => $request->director,
        ];

        if ($request->hasFile('poster')) {
            $movieData['poster'] = Storage::putFile('moviePosters', $request->poster);
        }

        Movie::create($movieData);

        return redirect()->route('movies.all')->with('message', 'Movie successfully created!');
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
        $request->validate([
            'title' => 'required|max:50',
            'poster' => 'image',
            'genre' => 'required|max:10',
            'director' => 'required|max:25'
        ]);

        $updateData = [
            'title' => $request->title,
            'genre' => $request->genre,
            'director' => $request->director,
        ];

        if ($request->hasFile('poster')) {
            $updateData['poster'] = Storage::putFile('moviePosters', $request->poster);
        }

        DB::table('movies')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('movies.all')->with('message', 'Movie sucessfully updated!');
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
