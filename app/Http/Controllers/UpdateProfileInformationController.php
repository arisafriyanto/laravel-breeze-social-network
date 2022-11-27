<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'username' => ['required', 'alpha_num', 'min:3', 'unique:users,username,' . auth()->id()],
            'email' => ['required', 'email', 'string', 'min:3', 'max:191', 'unique:users,email,' . auth()->user()->id],
        ]);

        auth()->user()->update($attr);

        return redirect()
            ->route('profile', auth()->user()->id)
            ->with('message', 'Your profile has been updated.');
    }
}
