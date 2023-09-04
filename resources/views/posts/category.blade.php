@extends('posts.layout.main')
@section('main')
    <main class="py-6">
        <form action="/admin/category/create" method="post" class="space-y-4 max-w-lg m-auto block mt-8">
            <h2 class="pb-4 text-3xl font-semibold">Add Category</h2>
            @csrf
            <div class="flex flex-col items-start gap-1 text-lg font-base">
                <label for="name">Category Name</label>
                <input required type="text" id="name" name="name" value="{{ old('name') }}"
                    class="px-3 py-1 border-2 border-gray-300 bg-white rounded-lg w-full">
                @error('name')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-2">
                <button type="submit" class="bg-blue-500 text-white rounded-lg px-6 py-2">Post</button>
            </div>
        </form>
    </main>
@endsection
