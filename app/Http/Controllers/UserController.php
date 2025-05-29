<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->search;

        $usersFromDB = DB::table('users');

        if($search) {
            $usersFromDB = $usersFromDB->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }

        $usersFromDB = $usersFromDB->get();

        return view('users.users_all', compact('usersFromDB'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.users_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email|max:25',
            'password' => 'required|min:8|max:25'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.all')->with('message', 'User adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.users_show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'user_photo' => 'image'
        ]);

        $updateData = [
            'name' => $request->name,
        ];

        if ($request->hasFile('user_photo')) {
            $updateData['user_photo'] = Storage::putFile('userPhotos', $request->user_photo);
        }

        DB::table('users')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('users.all')->with('message', 'User atualizado com sucesso!');
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
