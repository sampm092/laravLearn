<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);

        return view('admin.dashboard', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        Storage::disk('local')->delete('public/profile/' . $user->cover);
        $user->delete();

        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.dashboard')->with(['success' => 'Account deleted successfully !']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.dashboard')->with(['error' => 'Account can not be deleted']);
        }

    }

    public function viewUser(User $user)
    {
        $user = User::with('books')->findOrFail($user->id);
        // $profile = User::latest();

        $booksQuery = $user->books()->orderBy('created_at', 'DESC');
        // dump($user);

        // Apply search filters if the request has a 'search' parameter
        if (request()->has('search')) {
            $search = request()->get('search');
            $booksQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('author', 'LIKE', '%' . $search . '%');
            });
        }

        // Paginate after applying the search filters
        $books = $booksQuery->paginate(10);
        // $bookURL = Storage::url('public/books/' . $books->cover);
        $profileImageUrl = Storage::url('public/profile/' . $user->picture);


        return view('admin.detail', compact('user', 'books', 'profileImageUrl'));
    }

    public function editPassword(User $user)
    {

        return view('admin.password', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);


        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.dashboard')->with(['success' => 'User deleted successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.dashboard')->with(['error' => 'Delete failed']);
        }
    }

    public function updateProfileAdmin(Request $request, $id)
    {
       $user = User::findOrFail($id);

        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists
            if ($user->picture && Storage::disk('local')->exists('public/profile/' . $user->picture)) {
                Storage::disk('local')->delete('public/profile/' . $user->picture);
            }
        
            // Upload new picture
            $image = $request->file('picture');
            $image->storeAs('public/profile', $image->hashName());
        
            // Update the picture
            $user->update(['picture' => $image->hashName()]);
        }
        
        // Update the username if provided
        if (!empty($request->username)) {
            $user->update(['username' => $request->username]);
        }


        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.dashboard')->with(['success' => 'Book updated successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.dashboard')->with(['error' => 'Update failed']);
        }
    }

    public function changeRole(Request $request, User $user) {
        $user = User::findOrFail($user->id);
        
        if ($user->is_admin === 0) {
            $user->update([
                'is_admin' => 1
            ]);
        } else {
            $user->update([
                'is_admin' => 0
            ]);
        }


        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.dashboard')->with(['success' => 'User role changed successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.dashboard')->with(['error' => 'Update failed']);
        }
    }
}
