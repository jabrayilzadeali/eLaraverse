<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function edit()
    {
        return view('user.settings');
    }
    public function update()
    {
        $validated = request()->validate([
            'balance' => 'required',
        ]);
        $user = Auth::user();
        $user->update($validated);
        return redirect()->route('user.settings.edit')->with('success', 'User Updated Successfully');
    }
}
