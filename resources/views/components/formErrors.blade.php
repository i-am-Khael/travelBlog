
@props(['inputName'])
@error($inputName)
<small class="text-red-600">{{ $message }}</small>
@enderror
