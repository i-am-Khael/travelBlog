
@if (session()->has('success'))
<div class="w-full p-3 bg-gray-50 text-green-600" >
    {{ session()->get('success') }}
</div>
@endif


@if (session()->has('error'))
<div class="w-full p-3 bg-gray-50 text-red-600" >
    {{ session()->get('error') }}
</div>
@endif
