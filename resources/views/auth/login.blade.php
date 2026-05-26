@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <section class="auth-section">
        <div class="auth-card">
            <span class="eyebrow">Admin Dashboard</span>
            <h1>Masuk untuk mengelola UMKM</h1>
            <p>Gunakan akun admin untuk menambah produk, mengunggah foto, dan menulis artikel.</p>

            <form method="POST" action="{{ route('login.store') }}" class="form-stack">
                @csrf
                <label>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <small class="error">{{ $message }}</small> @enderror
                </label>
                <label>
                    Password
                    <input type="password" name="password" required>
                    @error('password') <small class="error">{{ $message }}</small> @enderror
                </label>
                <label class="check-row">
                    <input type="checkbox" name="remember" value="1">
                    <span>Ingat saya</span>
                </label>
                <button class="btn btn-dark full" type="submit">Masuk</button>
            </form>
        </div>
    </section>
@endsection
