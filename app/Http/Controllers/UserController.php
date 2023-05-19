<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use App\Http\Controllers\RememberToken;

// use Nette\Utils\Random;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $data = User::sortable()
                ->where('users.NIP', 'like', '%' . $cari . '%')
                ->orWhere('users.role', 'like', '%' . $cari . '%')
                ->orWhere('users.name', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(1);
        } else {
            $data = User::sortable()->paginate(5)->onEachSide(1);
        }

        return view('admin.users-admin', compact('data'), [
            'title' => 'Users',
            'name' => 'Kelurahan Oetete',
            'desc' => 'User Data',
            'button' => 'Users'
        ])->with([
            'data' => $data,
            'cari' => $cari
        ]);
    }

    public function addUser()
    {
        return view('admin.add-user-admin', [
            'title' => 'Add User',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Add New User',
            'button' => 'Users'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'NIP' => 'required|unique:users', // harus sama dgn name di form td d form nip tp d sini NIP jd ada error validasi
            'password' => 'required|min:5|max:255',
            'remember_token'
        ]);

        $data = [
            'name' => Str::title($request->name),
            'role' => $request->role,
            'NIP' => $request->NIP,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ];

        if (User::create($data)) {
            return redirect('/users');
        }
        // dd($request->all());
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.update-user-admin', compact('data'), [
            'title' => 'Edit Data User',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Edit Data User',
            'button' => 'Users'
        ]);
    }

    public function update(Request $request, $id)
    {
        if (User::find($id)->update([
            'name' => Str::title($request->name),
            'role' => $request->role,
            'NIP' => $request->NIP,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ])) {
            return redirect('/users')->with('Success', "Berhasil mengupdate");
        }
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users')->with('success', 'Data berhasil dihapus');
    }
}
