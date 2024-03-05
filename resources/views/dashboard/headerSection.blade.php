
@extends('layouts.__dashLayout')
@section('title', 'Header Section')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll" >

    <div class="w-full flex items-center justify-between">
        <h2>Contents</h2>
        <a href="{{route('header.create')}}">Add</a>
    </div>

    <x-flashMessage/>

    <div class="w-full overflow-x-scroll" >
        <table class="w-full">
            <thead>
                <tr class="text-left" >
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($headerContent as $content )
                <tr>
                    <td>{{ $content->title }}</td>
                    <td class="text-wrap line-clamp-1">{{ $content->desc }}</td>
                    <td>
                        <img src="{{asset('storage/'.$content->image)}}" alt="image"
                            class="w-[100px] h-[50px]">
                    </td>
                    <td>
                        <form id="form{{$content->id}}" action="{{ route('header.updatePublished', $content->id) }}" method="POST" >
                            @csrf
                            <input name="isPublished" type="checkbox" {{ $content->isPublished ? 'checked' : '' }} onchange="submitForm({{$content->id}})" >
                        </form>
                    </td>
                    <td class="flex gap-4">
                        <a href="{{ route('header.edit', $content->id) }}">Edit</a>
                        <form action="{{ route('header.delete', $content->id) }}" method="POST">
                            @method('delete') @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
