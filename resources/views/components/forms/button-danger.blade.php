@props(['name', 'type'])
<div>
    <button type="{{ $type }}"
        class="py-3 px-6 rounded-lg mt-4  outline-none bg-red-500 hover:bg-red-600 text-white">{{ $name }}</button>
</div>
