
@extends('layouts.__dashLayout')
@section('title', 'Update User')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll flex justify-center">

    <form action="{{ route('user.update', $user->id) }}" method="POST"
        class="w-[400px] max-sm:w-[90%] h-[300px] mx-auto p-4 border-[1px] border-gray-50/5 shadow-lg
            flex flex-col gap-5" >

        @method('put') @csrf

        <x-flashMessage/>

        <div class="w-full flex flex-col gap-2" >
            <label for="name" class="font-semibold">Name</label>
            <input name="name" id="name" type="text" value="{{ $user->name }}" required
                class="p-2 outline-none border-b-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName="name" />
        </div>

        <div class="w-full flex flex-col gap-2">
            <label for="email" class="font-semibold">Email</label>
            <input name="email" id="email" type="email" value="{{ $user->email }}" required
                class="p-2 outline-none border-b-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName="email" />
        </div>

        <button class="w-full py-2 bg-gray-50 text-gray-900 hover:bg-gray-50/10 hover:text-gray-50" >Update</button>

    </form>

</section>
@endsection
