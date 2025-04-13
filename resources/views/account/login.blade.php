@extends('user.layouts.app')
@section('title', "Đăng nhập")
@section('main')
    <div>
        <h1 class="mb-4">Đăng nhập</h1>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>
    </div>
@endsection
