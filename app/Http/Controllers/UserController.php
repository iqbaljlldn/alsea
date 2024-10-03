<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return response()->json([$users]);
    }

    public function show($id) {
        $users = User::findOrFail($id);

        return response()->json([$users]);
    }
    public function destroy($id) {
        $users = User::findOrFail($id);
        $users->delete();

        return response()->json(['message' => 'deleted']);
    }
}
