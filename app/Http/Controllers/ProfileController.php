<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $request->validate([
            'bio' => ['min:20', 'max:255'],
            'url' => ['url', 'max:255'],
            'avatar' => ['', 'image', 'mimes:jpeg,png,jpg,tiff,bmp', 'max:5120']
        ]);

        $data = [
            'bio' => $request->bio,
            'url' => $request->url,
        ];

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('uploads/'.$request->user()->username . '/avatars', 'public');
            Image::make('storage/' . $path)->fit(500, 500)->save();
            $data = array_merge($data, ['avatar'=>$path]);
        }

        $user->profile()->update($data);

        return redirect()->route('profile.show', $request->user()->username)->with(['success' => 'Profile updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        auth()->logout();
    }
}
