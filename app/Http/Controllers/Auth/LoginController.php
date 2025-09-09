<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // POST: /login
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::guard('web')->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // ป้องกัน session fixation
        $request->session()->regenerate();

        // ได้ user แน่นอนเพราะเพิ่ง login สำเร็จ
        $user = Auth::guard('web')->user();

        // เช็คเผื่อพัง (ไม่ควรเกิด แต่กันไว้)
        if (!$user) {
            return response()->json(['error' => 'User not found after login'], 500);
        }

        // preload groups (null-safe)
        if ($user instanceof \App\Models\User) {
            $user->load('groups');
        }

        return response()->json([
            'message' => 'Logged in',
            'user' => $this->transformUser($user),
        ]);
    }

    // POST: /logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out']);
    }

    // GET: /user
    public function user(Request $request)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        if ($user instanceof \App\Models\User) {
            $user->load('groups');
        }

        return response()->json($this->transformUser($user));
    }

    // --- helper function สำหรับจัดรูปแบบ user + groups ---
    private function transformUser($user)
    {
        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
            'groups' => $user->groups->map(function ($group) {
                return [
                    'id'          => $group->id,
                    'name'        => $group->name,
                    'description' => $group->description,
                ];
            })->values(),
        ];
    }
}
