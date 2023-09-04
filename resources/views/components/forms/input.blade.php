@props(['id','name','placeholder','label','type','value'])
<div>
    <label for="{{ $id }}" class="py-2 text-gray-600 block">{{ $label }}</label>
    <input type="{{ $type }}" value="{{ $value }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" class="w-full border border-gray-500 p-3 px-6 rounded-lg outline-blue-600">
</div>
