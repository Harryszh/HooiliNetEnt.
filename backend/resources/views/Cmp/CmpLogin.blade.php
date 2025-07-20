@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12">
    <h2 class="text-2xl font-bold mb-6">Login für Cmp</h2>

    @if(session('error'))
        <div class="text-red-600 mb-4">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('cmp.login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Benutzername</label>
            <input
                id="name"
                type="text"
                name="name"
                required
                class="w-full border px-3 py-2 rounded"
            >
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Passwort</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                class="w-full border px-3 py-2 rounded"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700"
        >
            Login
        </button>
    </form>
</div>
@endsection
