@extends('posts.layout.main')
@section('main')
    <main class="py-6">
        <form action="/admin/posts/create" method="post" class="space-y-4 max-w-lg m-auto block">
            @csrf
            <div class="flex flex-col items-start gap-1 text-lg font-base">
                <label for="title">Title</label>
                <input required type="text" id="title" name="title" value="{{ old('title') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('title')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start gap-1 text-lg font-base">
                <label for="subject">Subject</label>
                <input required type="subject" id="subject" name="subject" value="{{ old('subject') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('subject')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start gap-1 text-lg font-base">
                <label for="body">Body</label>
                <input required type="body" id="body" name="body" value="{{ old('body') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('body')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start gap-1 text-lg font-base">
                <label for="category">Category</label>
                <select name="category" id="category" value="{{ old('category') }}"
                    class="px-3 py-2 border-2 border-gray-300 bg-white rounded-lg w-full">
                    <option value="" disabled selected>Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- <div class="flex flex-col items-start gap-2 text-lg font-base">
                <label
                    class="border-2 border-dashed w-full h-24 border-gray-400 rounded-lg flex items-center justify-center text-gray-400"
                    for="thumbnail">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z">
                        </path>
                    </svg>
                </label>
                <input required type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg sr-only">
                @error('thumbnail')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div> --}}
            <div class="mt-2">
                <button type="submit" class="bg-blue-500 text-white rounded-lg px-6 py-2">Post</button>
            </div>
        </form>
    </main>
@endsection
