
@extends('layouts.__dashLayout')
@section('title', 'Create Articles')
@section('content')
<section class="w-full p-4 pb-[5rem] flex flex-col justify-center" >

    <x-flashMessage/>

    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data"
        class="w-[500px] max-md:w-full mx-auto mt-5 p-5 flex flex-col gap-6
            border-[1px] border-gray-50/5 shadow-lg rounded-md" >

        @csrf

        <div class="flex flex-col gap-2" >
            <label for="title" class="text-lg font-semibold tracking-wide" >Title</label>
            <input name="title" id="title" type="text" required
                class="w-full p-2 outline-none border-b-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent" >
            <x-formErrors inputName="title" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="content" class="text-lg font-semibold tracking-wide" >Content</label>
            <textarea name="content" id="" cols="30" rows="10" required
                class="p-4 outline-none border-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent rounded-md" ></textarea>
            <x-formErrors inputName="content" />
        </div>

        <div class="flex flex-col gap-2">
            <label for="image" class="text-lg font-semibold tracking-wide">Image</label>
            <input name="image" id="image" type="file" required >
            <x-formErrors inputName="image" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="featured" class="text-lg font-semibold tracking-wide">Featured</label>
            <div class="flex gap-4" >
                <div>
                    <span>Yes</span>
                    <input name="featured" id="featured" type="radio" value="1" >
                </div>
                <div>
                    <span>No</span>
                    <input name="featured" id="featured" type="radio" value="0" >
                </div>
            </div>
            <x-formErrors inputName="featured" />
        </div>

        <button type="submit"
            class="w-full py-2 font-bold uppercase tracking-wide rounded-md bg-gray-50 text-gray-900 hover:bg-gray-800 hover:text-gray-50" >Save</button>


    </form>
</section>
@endsection
