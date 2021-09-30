@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5>Selamat datang di halaman management, <strong>{{ Auth::user()->name }}</strong></h5>
                    <a href="{{ route('user.add') }}" class="btn btn-success">Tambahkan Pengguna</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>

                <div class="table-responsive card-footer">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">{{ __('nama') }}</th>
                                <th scope="col">{{ __('alamat e-mail') }}</th>
                                <th scope="col">Role</th>
                                <th scope="col">{{ __('aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning mb-1">{{ __('Ubah Data') }}</a>
                                    <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-1">{{ __('Hapus') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection