<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $users = User::where('usertype', 'user')->get(); // Fetch all non-admin users
        return view('admin.dashboard', compact('users'));
    }

    // Make User an Admin
    public function makeAdmin(User $user)
    {
        $user->update(['usertype' => 'admin']);
        return redirect()->route('admin.dashboard')->with('success', 'User promoted to admin successfully.');
    }



}
