@extends('layouts.__dashLayout')
@section('title', 'Add Header Content')
@section('content')
    <section class="w-full h-screen p-4 overflow-scroll flex items-center justify-center">

        <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data"
            class="p-5 flex flex-col gap-6 border-[1px] border-gray-50/5 shadow-lg">

            @csrf <x-flashMessage />

            <div class="flex flex-col">
                <label for="title" class="text-lg font-semibold tracking-wide" >Title</label>
                <input name="title" id="title" type="text" required
                    class="p-2 outline-none border-b-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent" >
                <x-formErrors inputName="title" />
            </div>

            <div class="flex flex-col gap-2">
                <label for="desc" class="text-lg font-semibold tracking-wider" >Description</label>
                <textarea name="desc" id="desc" cols="30" rows="6"
                    class="p-4 bg-transparent border-[1px] border-gray-50/5 focus:border-gray-50 outline-none"></textarea>
                <x-formErrors inputName="desc" />
            </div>

            <div class="flex flex-col gap-2">
                <label for="image" class="text-lg font-semibold tracking-wide">Image</label>
                <input name="image" id="image" type="file" required>
                <x-formErrors inputName="image" />
            </div>

            <button class="w-full py-2 uppercase tracking-wide outline-none border-none hover:bg-gray-400 bg-gray-50 text-gray-900">Save</button>

        </form>

    </section>
@endsection
