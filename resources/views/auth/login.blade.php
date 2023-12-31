@extends('auth.layout.main')
@section('main')
    <section class="w-full pt-24">
        <form action="/login" class="w-1/2 m-auto py-4 px-24 bg-gray-200 border border-gray-400 rounded-xl space-y-3"
            method="post">
            @csrf
            <h2 class="text-4xl pb-4 font-semibold">Login Here ..</h2>
            <div class="flex flex-col items-start text-lg font-base">
                <label for="email">Email</label>
                <input required type="email" id="email" name="email"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('email')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start text-lg font-base">
                <label for="password">Password</label>
                <input required type="password" id="password" name="password"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('password')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <button type="submit" class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Login</button>
            </div>
        </form>
    </section>
@endsection
