<?php

namespace App\Http\Controllers;

use App\Models\TblPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TblPostController extends Controller
{
    public function create()
    {
        return view('post.addpost');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        TblPost::create([
            'cat' => $request->cat,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'author' => Auth::user()->name, // Fetch the logged-in user's name
            'tags' => $request->tags,
            'date' => $request->date,
        ]);

        return redirect()->route('post.addpost')->with('success', 'Post added successfully!');
    }

    public function index()
    {
        // Fetch posts created by the logged-in user
        $posts = TblPost::where('author', auth()->user()->name)->get();
        return view('post.index', compact('posts'));
    }

    public function destroy($id)
    {
        $post = TblPost::findOrFail($id);

        // Ensure only the author can delete their own post
        if ($post->author !== auth()->user()->name) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $post = TblPost::findOrFail($id);

        // Ensure the logged-in user is the author of the post
        if ($post->author !== auth()->user()->name) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'cat' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'cat' => $request->cat,
            'tags' => $request->tags,
            'date' => $request->date,
        ]);

        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }

    public function edit($id)
    {
        $post = TblPost::findOrFail($id);

        // Ensure the logged-in user is the author of the post
        if ($post->author !== auth()->user()->name) {
            abort(403, 'Unauthorized action.');
        }

        return view('post.edit', compact('post'));
    }


}
