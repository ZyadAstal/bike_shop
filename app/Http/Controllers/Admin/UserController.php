<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,customer',
        ]);


        if ($user->id === auth()->id() && $validated['role'] !== 'admin') {
            return back()->withErrors(['error' => 'You cannot change your own role.']);
        }

        $user->update($validated);

        return back()->with('success', 'User role updated successfully!');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['error' => 'You cannot delete your own account.']);
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
