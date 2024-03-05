
@extends('layouts.__dashLayout')
@section('title', 'Edit Article')
@section('content')
<section class="w-full h-screen p-4 overflow-hidden flex flex-col items-center" >

    <x-flashMessage/>

    <form action="{{ route('article.update', $data->id) }}" method="POST" enctype="multipart/form-data"
        class="w-full flex flex-col gap-6" >

        @method('put') @csrf

        <div class="flex flex-col gap-2">
            <label for="title">Title</label>
            <input name="title" type="text" value="{{$data->title}}" >
            <x-formErrors inputName="title" />
        </div>

        <div class="flex flex-col gap-2">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10">{{ $data->content }}</textarea>
            <x-formErrors inputName="content" />
        </div>

        <div class="flex flex-col gap-2">
            <label for="image">Image</label>
            <input name="image" id="image" type="file" >
            <x-formErrors inputName="image" />
        </div>

        <div class="flex flex-col gap-2">
            <label for="featured">Featured</label>
            <div class="flex gap-6">
                <div class="flex" >
                    <input type="radio" name="featured" id="yes" value="1" {{ $data->featured === 1 ? 'checked' : '' }} >
                    <label for="yes">Yes</label>
                </div>
                <div class="flex gap-1" >
                    <input type="radio" name="featured" id="no" value="0" {{ $data->featured === 1 ? '' : 'checked' }} >
                    <label for="no">No</label>
                </div>
            </div>
        </div>

        <button class="w-full py-2" >Update</button>

    </form>

</section>
@endsection
