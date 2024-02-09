<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changePP(Request $request) {
        $validated = $request->validate([
            'gambar' => 'image|file|max:2048',
        ]);

        if($request->file('gambar')){
            $validated['gambar'] = env('APP_URL') . '/storage/' . $request->file('gambar')->store('upload');
            if($request->old_gambar){
                Storage::delete($request->old_gambar);
            }
        }

        User::where('id', auth()->id())->update($validated);

        return back()->with('change_success', 'Berhasil merubah foto profile');
    }

    public function removePP(){
        $gambar = User::where('id', auth()->id())->first()->gambar;

        Storage::delete($gambar);

        User::where('id', auth()->id())->update([
            'gambar' => null
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus gambar'
        ], 201);
    }

    public function changeGambar(Request $request) {
        $validated = $request->validate([
            'gambar' => 'image|file|max:2048',
        ]);

        if($request->file('gambar')){
            $validated['gambar'] = env('APP_URL') . '/storage/' . $request->file('gambar')->store('upload');
            if($request->old_gambar){
                Storage::delete($request->old_gambar);
            }
        }

        User::where('id', auth()->id())->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil merubah gambar'
        ], 201);
    }
}
