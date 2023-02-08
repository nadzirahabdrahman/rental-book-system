<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rentlogs' => $rentlogs]);
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    public function registered()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('user-registered', ['registeredUsers' => $registeredUsers]);
    }

    public function detail($slug)
    {
        $users = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $users->id)->get();
        return view('user-detail', ['users' => $users, 'rentlogs' => $rentlogs]);
    }

    public function approve($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->status = 'Active';
        $users->save();

        return redirect('user-detail/'.$slug)->with('status', 'User has been approved');
    }

    public function delete($slug)
    {
        $users = User::where('slug', $slug)->first();
        return view('user-delete', ['users' => $users]);
    }

    public function destroy($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->delete();

        return redirect('user')->with('status', 'User deleted successfully');
    }

    public function deleted()
    {
        $deletedUsers = User::onlyTrashed()->get();
        return view('user-deleted-list', ['deletedUsers' => $deletedUsers]);
    }

    public function restore($slug)
    {
        $users = User::withTrashed()->where('slug', $slug)->first();
        $users->restore();

        return redirect('user')->with('status', 'User has been restored');
    }
}
