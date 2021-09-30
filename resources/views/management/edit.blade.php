<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Form Edit User</h3>
                </div>
                <form action="{{ route('user.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Email</strong></label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Role</strong></label>
                        <select name="role_id" class="form-select form-control" aria-label="Default select example" placeholder="Role">
                            <option selected hidden>--Pilih Role--</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if ($role->id == $user->role_id) {{ 'selected' }} @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>