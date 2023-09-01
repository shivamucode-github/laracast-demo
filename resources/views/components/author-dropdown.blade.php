<div>
    <button class="hover:text-blue-500" href="#" x-on:click="open = ! open">Authors</button>
    <div x-show="open"
        class="z-10 w-40 absolute -left-3 top-7 max-h-48 overflow-auto bg-gray-200 rounded-lg py-3">
        <a href="/"
            class="@if (!$currentUser) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
            All
        </a>
        @foreach ($users as $user)
            <a href="/?author={{ $user->slug }}"
                class="@if ($currentUser == $user->id) text-white bg-blue-600 @endif hover:text-white hover:bg-blue-500 px-3 block py-1">
                {{ $user->name }}
            </a>
        @endforeach
    </div>
</div>
