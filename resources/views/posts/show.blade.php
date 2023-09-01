@extends('posts.layout.main')
@section('main')
    <main class="py-6 max-w-5xl m-auto">
        <section class=" m-auto max-w-4xl">
            <h2 class="pb-6 text-3xl font-medium">Post Section</h2>
            <section class="bg-gray-300 rounded-md px-6 py-6">
                <div class="flex flex-col gap-2">
                    <span>
                        <span class="font-semibold">Category :</span>
                        <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 px-3">
                            {{ $post->category->name }}
                        </a>
                    </span>
                    <span>
                        <span class="font-semibold">Author :</span>
                        <a href="/author/{{ $post->user->slug }}" class="text-blue-500 px-3">
                            {{ $post->user->name }}
                        </a>
                    </span>
                    <span><span class="font-semibold">Subject : </span><span class="font-base px-3">
                            {{ $post->title }}</span></span>
                    <span><span class="font-semibold">Published On :</span><span class="font-base px-3">
                            {{ $post->created_at->format('d-M-Y') }}</span></span>
                </div>
                <div class="text-sm pt-10 space-y-3 gap-4">{!! $post->body !!}</div>
                <a href="/" class="underline text-blue-600 mt-10 inline-block px-6 py-4">Go Back</a>
            </section>
        </section>
    </main>
@endsection
