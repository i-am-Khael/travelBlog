
@extends('layouts.__dashLayout')
@section('title', 'Update User')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll flex justify-center">

    <form action="{{ route('user.update', $user->id) }}" method="POST"
        class="w-[400px] max-sm:w-[90%] h-[300px] mx-auto p-4 border-[1px] border-gray-50/5 shadow-lg
            flex flex-col gap-5 items-center justify-center" >

        @method('put') @csrf

        <x-flashMessage/>

        <div class="w-full flex flex-col gap-1" >
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{ $user->name }}" required
                class="outline-none border-none bg-transparent" >
            <x-formErrors inputName="name" />
        </div>

        <div class="w-full flex flex-col gap-1">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" value="{{ $user->email }}" required
                class="outline-none border-none bg-transparent" >
            <x-formErrors inputName="email" />
        </div>

        <button>Update</button>

    </form>

</section>
@endsection
