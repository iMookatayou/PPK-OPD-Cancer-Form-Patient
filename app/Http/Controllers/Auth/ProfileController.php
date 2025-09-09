<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'current_password' => ['required'],
            'new_password' => ['required', 'min:6'],
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Email หรือรหัสผ่านเดิมไม่ถูกต้อง'], 422);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว']);
    }
}