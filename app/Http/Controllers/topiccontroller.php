<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class topicController extends Controller
{
    // Display the form
    public function create()
    {
        return view('topics.addtopics'); // Refers to add-topic.blade.php
    }

    // Store the submitted topic in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        // Insert data into the database
        DB::table('topics_name')->insert([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
        ]);

        // Redirect with success message
        return redirect()->route('topics.addtopics')->with('success', 'Topic added successfully!');
    }

    public function index()
    {
        $topics = DB::table('topics_name')->get();
        return view('topics.index', compact('topics'));
    }

    // Show edit form
    public function edit($id)
    {
        $topic = DB::table('topics_name')->find($id);
        return view('topics.edit', compact('topic'));
    }

    // Update topic
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        DB::table('topics_name')->where('id', $id)->update([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
        ]);

        return redirect()->route('topics.index')->with('success', 'Topic updated successfully!');
    }

    // Delete topic
    public function destroy($id)
    {
        DB::table('topics_name')->where('id', $id)->delete();
        return redirect()->route('topics.index')->with('success', 'Topic deleted successfully!');
    }
}
