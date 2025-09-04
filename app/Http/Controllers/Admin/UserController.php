<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends AdminController
{
    public function index(Request $request)
    {
        $query = User::with(['role', 'orders'])
            ->withCount(['orders', 'reviews']);

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }

        // Role filter
        if ($request->filled('role')) {
            $query->where('role_id', $request->role);
        }

        // Status filter
        if ($request->filled('status')) {
            if ($request->status === 'verified') {
                $query->whereNotNull('email_verified_at');
            } elseif ($request->status === 'unverified') {
                $query->whereNull('email_verified_at');
            }
        }

        $users = $query->latest()->paginate(15);
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:20',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load(['role', 'orders.items.product', 'reviews.product', 'addresses']);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Prevent deletion of super admin
        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Cannot delete super admin user.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,activate,deactivate,verify,unverify',
            'users' => 'required|array',
            'users.*' => 'exists:users,id'
        ]);

        $users = User::whereIn('id', $request->users);

        switch ($request->action) {
            case 'delete':
                // Prevent deletion of super admins
                $users->whereDoesntHave('role', function($q) {
                    $q->where('name', 'super_admin');
                })->delete();
                $message = 'Users deleted successfully.';
                break;
            case 'activate':
                $users->update(['email_verified_at' => now()]);
                $message = 'Users activated successfully.';
                break;
            case 'deactivate':
                $users->update(['email_verified_at' => null]);
                $message = 'Users deactivated successfully.';
                break;
            case 'verify':
                $users->update(['email_verified_at' => now()]);
                $message = 'Users verified successfully.';
                break;
            case 'unverify':
                $users->update(['email_verified_at' => null]);
                $message = 'Users unverified successfully.';
                break;
        }

        return redirect()->route('admin.users.index')->with('success', $message);
    }

    public function toggleStatus(User $user)
    {
        if ($user->isSuperAdmin()) {
            return $this->errorResponse('Cannot modify super admin status');
        }

        $user->update([
            'email_verified_at' => $user->email_verified_at ? null : now()
        ]);

        return $this->successResponse('User status updated successfully', [
            'verified' => !is_null($user->email_verified_at)
        ]);
    }
}
