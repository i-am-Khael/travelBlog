
@extends('layouts.__dashLayout')
@section('title', 'Add Header Content')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll flex justify-center" >

    <form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-6">

        @csrf <x-flashMessage/>

        <div class="flex flex-col gap-2" >
            <label for="title">Title</label>
            <input name="title" id="title" type="text" required >
            <x-formErrors inputName="title" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="6"></textarea>
            <x-formErrors inputName="desc" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="image">Image</label>
            <input name="image" id="image" type="file" required >
            <x-formErrors inputName="image" />
        </div>

        <button class="w-full outline-none border-none hover:bg-gray-400 bg-gray-50 text-gray-900">Save</button>

    </form>

</section>
@endsection
