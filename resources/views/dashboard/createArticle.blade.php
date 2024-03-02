
@extends('layouts.__dashLayout')
@section('title', 'Create Articles')
@section('content')
<section class="w-full p-4 flex flex-col justify-center" >

    <x-flashMessage/>

    <form action="{{route('article.store')}}" method="POST" class="flex flex-col gap-6" >

        @csrf

        <input name="userID" type="text" value="{{ auth()->user()->id }}" hidden >

        <div class="flex flex-col gap-2" >
            <label for="title">Title</label>
            <input name="title" id="title" type="text" required
                class="" >
            <x-formErrors inputName="title" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="content">Content</label>
            <textarea name="content" id="" cols="30" rows="10" required ></textarea>
            <x-formErrors inputName="content" />
        </div>

        <div class="flex flex-col gap-2" >
            <label for="featured">Featured</label>
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

        <button type="submit" >Save</button>


    </form>
</section>
@endsection
