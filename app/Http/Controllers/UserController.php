<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('links');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'text_color'  =>  'required|max:7|starts_with:#',
            'background_color'  =>  'required|max:7|starts_with:#'
        ]);

        Auth::user()->update($request->only(['text_color', 'background_color']));

        return redirect()->back()->with(['success', 'Changes saved successfully']);
    }
}
