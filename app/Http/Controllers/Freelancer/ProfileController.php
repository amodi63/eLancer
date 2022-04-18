<?php

namespace App\Http\Controllers\freelancer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->freelancer;
        return view('freelancer.profile', [
            'profile' => $profile,
        ]);
    }
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->freelancer;
        // dd($profile);
        return view('freelancer.edit', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->freelancer()->updateOrCreate([
            'user_id' => $user->id
        ], $request->all());
        // Mass Asymeant
        return redirect()->route('Freelancer.index')->with('success', 'Profile Updated!');
    }
}
