<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'caption' => ['required', 'string', 'max:255'],
            'description' => ['', 'max:1000'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,tiff,bmp', 'max:5120']
        ]);

        $path = $request->file('image')->store('uploads/' . $request->user()->username . '/posts', 'public');
        Image::make('storage/' . $path)->fit(1500, null, function ($constraint){
            $constraint->aspectRatio();
        })->save();

        $request->user()->post()->create([
            'caption' => $request->caption,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect()->route('profile.show', $request->user()->username)->with(['success' => 'Posts created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return View
     * @throws AuthorizationException
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('post.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->validate([
            'caption' => ['required', 'string', 'max:255'],
            'description' => ['', 'max:1000']
        ]));
        return redirect()->route('post.show', $post->id)->with(['success' => 'Post updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->home()->with(['danger' => 'Post delete success.']);
    }
}
