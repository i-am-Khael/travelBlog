
@extends('layouts.__dashLayout')
@section('title', 'Add user')
@section('content')
<section class="w-full h-screen p-4 pb-20 overflow-scroll flex flex-col items-center justify-center" >

    <x-flashMessage/>

    <form action="{{ route('user.store') }}" method="POST"
        class="w-[500px] max-md:w-full p-6 border-[1px] border-gray-50/10 flex flex-col gap-6">

        @csrf

        <div class="flex flex-col" >
            <label for="name" class="text-lg font-semibold tracking-wide">Name</label>
            <input name="name" id="name" type="text" required
                class="w-full p-2 outline-none border-b-[1px] border-gray-50/10 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName='name' />
        </div>

        <div class="flex flex-col" >
            <label for="email" class="text-lg font-semibold tracking-wide">Email</label>
            <input name="email" id="email" type="email" required
                class="w-full p-2 outline-none border-b-[1px] border-gray-50/10 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName='email' />
        </div>

        <div class="flex flex-col" >
            <label for="password" class="text-lg font-semibold tracking-wide">Password</label>
            <input name="password" id="password" type="password" required
                class="w-full p-2 outline-none border-b-[1px] border-gray-50/10 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName='password' />
        </div>

        <button class="w-full py-2 font-bold uppercase tracking-wide rounded-md bg-gray-50 text-gray-900 hover:bg-gray-700 hover:text-gray-50" >Add</button>

    </form>

</section>
@endsection
