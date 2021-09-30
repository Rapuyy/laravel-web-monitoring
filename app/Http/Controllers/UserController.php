<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('management.index', compact('users'));
    }

    public function showAdminRegister()
    {
        $roles = Role::all();
        return view('management.register', compact('roles'));
    }

    public function adminRegister(Request $request)
    {
        // dd($request);
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'role_id'               => 'exists:App\Models\Role,id'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'role_id.exists'        => 'Role tidak sesuai'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->role_id = $request->role_id;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('user.index');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('user.add');
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('management.edit', compact(['user', 'roles']));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->role_id = $request->role_id;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
        // dd($simpan);
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('user.index');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('user.edit', ['id' => $request->id]);
        }
    }

    public function delete($id)
    {
        $deletedUser = User::where('id', $id)->delete();
        return back()->with('success', 'User successfully deleted');
    }

}
