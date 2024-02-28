
@extends('layouts.__dashLayout')
@section('title', 'Add user')
@section('content')
<section class="w-full h-screen p-4 pb-20 overflow-scroll flex flex-col items-center" >

    <x-flashMessage/>

    <form action="{{ route('dash.store') }}" method="POST"
        class="mt-10">

        @csrf

        <div class="flex flex-col gap-2" >
            <label for="name">Name</label>
            <input name="name" id="name" type="text" required >
        </div>

        <div class="flex flex-col gap-2" >
            <label for="email">Email</label>
            <input name="email" id="email" type="email" required >
        </div>

        <div class="flex flex-col gap-2" >
            <label for="password">Password</label>
            <input name="password" id="password" type="password" required >
        </div>

        <button>Add</button>

    </form>

</section>
@endsection
