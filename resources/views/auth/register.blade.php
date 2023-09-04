@extends('auth.layout.main')
@section('main')
    <section class="w-full pt-8">
        <form action="/register" enctype="multipart/form-data" class="w-1/2 m-auto py-4 px-24 bg-gray-200 border border-gray-400 rounded-xl space-y-3"
            method="post">
            @csrf
            <h2 class="text-4xl pb-4 font-semibold">Register Here ..</h2>
            <div class="flex flex-col items-start text-lg font-base">
                <label for="username">Username</label>
                <input required type="text" id="username" name="username" value="{{ old('username') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('username')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start text-lg font-base">
                <label for="email">Email</label>
                <input required type="email" id="email" name="email" value="{{ old('email') }}"
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
            <div class="flex flex-col items-start text-lg font-base">
                <label for="confirm_password">Confirm Password</label>
                <input required type="password" id="confirm_password" name="confirm_password"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('confirm_password')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <label for="image">Confirm Password</label>
                <input type="file" id="image" name="image"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('image')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <button type="submit" class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Submit</button>
            </div>
        </form>
    </section>
@endsection
