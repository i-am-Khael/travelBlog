
@extends('layouts.__dashLayout')
@section('title', 'Update Header Content')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll flex flex-col items-center" >

    <x-flashMessage/>

    <form action="{{ route('header.update', $content->id) }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-6">

        @method('put') @csrf

        <div class="flex flex-col" >
            <label for="title">Ttile</label>
            <input name="title" id="title" type="text" value="{{ $content->title }}" >
        </div>

        <div class="flex flex-col" >
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="6"  >{{ $content->desc }}</textarea>
        </div>

        <div class="flex gap-6">
            <label for="isPublished">Published: </label>
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
            <label for="image">Image</label>
            <input name="image" id="image" type="file" >
            <x-formErrors inputName="image" />
        </div>

        <button class="w-full py-2 bg-gray-50 text-gray-900 hover:bg-gray-600 hover:text-gray-50">Update</button>

    </form>

</section>
@endsection
