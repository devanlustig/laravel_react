<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        // Lakukan apa pun yang Anda butuhkan di sini untuk mendapatkan data pengguna
        $users = User::all();

        // Kembalikan data sebagai respons JSON
        return response()->json($users);
    }

    public function listUsers(Request $request)
    {
        
        $sortBy = $request->query('sort_by', 'created_at');
        $sortOrder = $request->query('sort_order', 'desc');
        $sortOrder = ($sortOrder == 'asc') ? 'asc' : 'desc';
        $users = User::orderBy($sortBy, $sortOrder)->paginate(5);
        
        return view('users.index', compact('users'));
    }
}
