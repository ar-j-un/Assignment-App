<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();

            return DataTables::eloquent($users)
                ->addColumn('created_at', function ($user) {
                    return Carbon::parse($user->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($user) {
                    return '
                        <a href="'.route('user.edit', $user->id).'" class="btn btn-success btn-sm">Edit</a>
                        <button data-id="'.$user->id.'" class="btn btn-danger btn-sm delete-user">Delete</button>
                    ';
                })
                ->make(true);
        }

        return view('users');
    }
}
