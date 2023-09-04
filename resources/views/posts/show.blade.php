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
            <section class="mt-4 bg-slate-200 rounded-lg px-6 max-h-screen overflow-auto">
                <h2 class="text-2xl font-semibold py-4">Comments</h2>
                <div class="max-w-2xl m-auto pb-6">
                    <form action="/comment/{{ $post->slug }}" method="post" class="relative">
                        @csrf
                        <textarea name="body" id="" cols="10" rows="5"
                            class="w-full p-4 pr-16 resize-none rounded-lg border border-slate-300 outline-blue-500"
                            placeholder="Want to something say write here!"></textarea>
                        <button type="submit" class="absolute bottom-4 right-2 bg-blue-200 p-3 rounded-full">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
                <section class="space-y-5">
                    @foreach ($comments as $comment)
                        <section class="bg-slate-300 max-w-xl m-auto p-4 rounded-md flex items-start gap-6">
                            <div>
                                @php
                                    if ($comment->user->image) {
                                        $image = asset('storage/' . $comment->user->image);
                                    } else {
                                        $image =
                                            'data:image/jpeg;base64,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';
                                    }
                                @endphp
                                <img src="{{ $image }}" alt="" class="w-24 h-20 rounded-full object-cover">
                            </div>
                            <div class="space-y-4 w-full">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-semibold block">{{ $comment->user->name }}</span>
                                    <span class="block">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </section>
                    @endforeach
                </section>
            </section>
        </section>
    </main>
@endsection
