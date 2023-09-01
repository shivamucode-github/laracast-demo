@extends('posts.layout.main')
@section('main')
    <main class="py-6 max-w-5xl m-auto">
        @if ($posts->count())
            <section class="">
                <h2 class="pb-6 text-2xl font-medium">Latest Posts</h2>
                <section class="grid grid-cols-2 gap-4">
                    @foreach ($posts as $key => $post)
                        @if ($key < 2)
                            <a href="/post/{{ $post->slug }}">
                                <section class="bg-blue-400 h-72 rounded-md relative  text-white">
                                    <div class="absolute top-0 px-6 py-6 text-white flex flex-col gap-1">
                                        <span class="pl-1">
                                            <span>Category : </span>
                                            {{ $post->category->name }}
                                        </span>
                                        <span class="pl-1">
                                            <span>Author : </span>
                                            {{ $post->user->name }}
                                        </span>
                                    </div>
                                    <div class="absolute bottom-0 px-6 py-6">
                                        <div class="flex flex-col gap-4">
                                            <span>{{ $post->title }}</span>
                                            <span>{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm pt-4">{!! $post->subject !!}</p>
                                    </div>
                                </section>
                            </a>
                        @endif
                    @endforeach
                </section>
            </section>
        @else
            <div class="py-8 w-full text-center">
                <span class="text-3xl font-semibold">No Record Found</span>
            </div>
        @endif
        @if ($posts->count() > 2)
            <section class="pt-8">
                <h2 class="pb-6 text-2xl font-medium">Other Post</h2>
                <section class="grid grid-cols-3 gap-4">
                    @foreach ($posts as $key => $post)
                        @if ($key >= 2)
                            <a href="/post/{{ $post->slug }}">
                                <section class="bg-blue-400 h-72 rounded-md relative  text-white">
                                    <div class="absolute top-0 px-6 py-6 text-white flex flex-col gap-1">
                                        <span class="pl-1">
                                            <span>Category : </span>
                                            {{ $post->category->name }}
                                        </span>
                                        <span class="pl-1">
                                            <span>Author : </span>
                                            {{ $post->user->name }}
                                        </span>
                                    </div>
                                    <div class="absolute bottom-0 px-6 py-6">
                                        <div class="flex flex-col gap-4">
                                            <span>{{ $post->title }}</span>
                                            <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </section>
                            </a>
                        @endif
                    @endforeach
                </section>
                {{ $posts->links() }}
            </section>
        @endif

    </main>
@endsection
