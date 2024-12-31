<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{   

    // public function create()
    // {
    //     return view('post.addpost'); // Ensure this matches your Blade file's location
    // }

    public function create()
    {
        $courses = Courses::all(); // Fetch all courses from the database
        return view('posts.create', compact('courses'));
    }


    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'cat' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = 'images/' . $imageName;
        }

        // Save the data in the tbl_post table
        Post::create($validatedData);

        // Redirect with success message
        return redirect()->route('post.addpost')->with('success', 'Post created successfully!');
    }

    public function showTopics() {
        // Fetch all topics from the database
        $topics = DB::table('courses')->select('id','name')->get();
    
        // Pass data to index view
        return view('index', compact('topics'));
    }
}
