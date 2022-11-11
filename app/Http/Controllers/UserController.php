<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function getAjax()
    {
        $results = User::all();

        return DataTables::of($results)
                            ->addIndexColumn()
                            ->make(true);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|unique:users',
            'password'      => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('users.home')->with('message', 'Pengguna telah berjaya ditambah !');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'user_role'     => 'required',
            'password'      => 'required|min:6|confirmed',
        ]);

        User::find($id)->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'user_role'     => $request->user_role,
            'password'      => $request->password,
        ]);

        return redirect()->route('user.index')->with('message', 'Pengguna telah berjaya disunting !');
    }

    public function destroy($id)
    {

        if($id == '1'){
            return redirect()->back()->withErrors(['Pengguna ini tidak dibenarkan untuk padam.']);
        }

        User::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Pengguna telah berjaya dipadam !');
    }
}
