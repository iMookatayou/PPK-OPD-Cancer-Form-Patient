<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // ส่งออก user ตรงๆ ได้เลย ไม่ต้อง .toArray()
        return response()->json([
            'message' => 'Welcome to admin dashboard!',
            'user' => $user,
        ]);
    }
}
