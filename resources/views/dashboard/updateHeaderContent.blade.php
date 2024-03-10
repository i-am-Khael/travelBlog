
@extends('layouts.__dashLayout')
@section('title', 'Update Header Content')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll flex flex-col items-center" >

    <x-flashMessage/>

    <form action="{{ route('header.update', $content->id) }}" method="POST" enctype="multipart/form-data"
        class="p-5 rounded-md border-[1px] border-gray-50/5 shadow-md flex flex-col gap-6">

        @method('put') @csrf

        <div class="flex flex-col gap-2" >
            <label for="title" class="font-semibold" >Title</label>
            <input name="title" id="title" type="text" value="{{ $content->title }}"
                class="p-2 bg-transparent outline-none border-b-[1px] border-gray-50/5 focus:border-gray-50" >
        </div>

        <div class="flex flex-col gap-2" >
            <label for="desc" class="font-semibold" >Description</label>
            <textarea name="desc" id="desc" cols="30" rows="6"
                class="p-2 outline-none border-[1px] border-gray-50/5 focus:border-gray-50 bg-transparent"  >{{ $content->desc }}</textarea>
        </div>

        <div class="flex gap-6">
            <label for="isPublished" class="font-semibold" >Published: </label>
            <div class="flex gap-4">
                <div>
                    <input type="radio" name="isPublished" id="isPublished" value="1" {{ $content->isPublished ? 'checked' : '' }} >
                    <span>yes</span>
                </div>
                <div>
                    <input type="radio" name="isPublished" id="isPublished" value="0" {{ $content->isPublished ? '' : 'checked' }} >
                    <span>no</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2" >
            <label for="image" class="font-semibold" >Image</label>
            <input name="image" id="image" type="file" >
            <x-formErrors inputName="image" />
        </div>

        <button class="w-full py-2 bg-gray-50 text-gray-900 hover:bg-gray-600 hover:text-gray-50">Update</button>

    </form>

</section>
@endsection
