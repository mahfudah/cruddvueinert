<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Inertia Scholl User";
        $datauser = DB::table('users')->paginate(5);
        return Inertia::render('User/Index', [
            'title' => $title,
            'datauser' => $datauser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah User";
        return Inertia::render('User/TambahUser', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ];
        DB::table('users')->insert($data);

        return Redirect::route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return Redirect::route('users')->with('error', 'User tidak ditemukan.');
        }

        return Inertia::render('User/Detail', [
            'user' => $user
        ]);
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
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return Redirect::route('users')->with('error', 'User tidak ditemukan.');
        }

        DB::table('users')->where('id', $id)->delete();

        return Redirect::route('users');
    }
}
