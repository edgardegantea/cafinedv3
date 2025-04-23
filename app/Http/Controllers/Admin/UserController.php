<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(7);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|max:8192',
            'role' => 'required',
            'type' => 'required',
            'bio' => 'nullable',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image_path) {
                Storage::delete($user->image_path);
            }
            $data['image_path'] = Storage::put('images/users', $request->file('image'));
        }

        // Only update the password if a new one was provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // If no new password, remove it from the $data array to prevent unintentional changes
            unset($data['password']);
        }

        $user->update($data);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Correcto!',
            'text'  => 'Información de usuario actualizada correctamente.',
        ]);

        return redirect()->route('admin.users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
