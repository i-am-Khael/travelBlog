
@extends('layouts.__dashLayout')
@section('title', 'Update User')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll">

    <form action="{{ route('user.update', $user->id) }}" method="POST">

        @method('put') @csrf

        <x-flashMessage/>

        <div>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{ $user->name }}" required
                class="outline-none border-none bg-transparent" >
            <x-formErrors inputName="name" />
        </div>

        <div class="flex flex-col">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" value="{{ $user->email }}" required
                class="outline-none border-none bg-transparent" >
            <x-formErrors inputName="email" />
        </div>

        <button>Update</button>

    </form>

</section>
@endsection
