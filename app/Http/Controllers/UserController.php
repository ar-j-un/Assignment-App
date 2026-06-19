<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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
                ->addIndexColumn()
                ->addColumn('created_at', function ($user) {
                    return Carbon::parse($user->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($user) {
                    return '
                    <a href="'.route('users.edit', $user->id).'" class="btn btn-success btn-sm">Edit</a>
                    <button data-id="'.$user->id.'" class="btn btn-danger btn-sm delete-user">Delete</button>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }

    /**
     * Function: edit
     * Description: Edit User
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users-edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Function: destroy
     * Description: Delete User
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'User Deleted Successfully!']);
        }

        return response()->json(['status' => 'failed', 'message' => 'Unable to delete user!']);
    }
}
